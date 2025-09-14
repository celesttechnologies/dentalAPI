<?php

namespace App\Services;

use App\Models\PatientTreatmentsDone;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\PatientTreatmentsDoneResource;
use App\Models\Patient;
use App\Models\WaitingAreaPatient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PatientTreatmentsDoneService
{
    /**
     * Get a paginated list of Patient Treatments Done.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientTreatmentsDone(Patient $patient, int $perPage, string $status, $startDate = null, $endDate = null): array
    {
        // Fetch all treatments for the patient
        $allTreatments = PatientTreatmentsDone::where('PatientID', $patient->id)
            ->when($status == 'ongoing', function ($query) {
                return $query->where('IsArchived', 0);
            })
            ->when($status == 'completed', function ($query) {
                return $query->where('IsArchived', 1);
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('TreatmentDate', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('TreatmentDate', '<=', $endDate);
            })
            ->orderBy('TreatmentDate', 'desc')
            ->get();

        // Group treatments by ParentPatientTreatmentDoneID
        $parents = $allTreatments->where('ParentPatientTreatmentDoneID', '00000000-0000-0000-0000-000000000000')->values();

        // Attach children to their respective parents
        $parents = $parents->map(function ($parent) use ($allTreatments) {
            $children = $allTreatments->where('ParentPatientTreatmentDoneID', $parent->PatientTreatmentDoneID)->values();
            $parent->children = $children;
            return $parent;
        });

        // Paginate the parent treatments
        $page = request('page', 1);
        $perPage = $perPage > 0 ? $perPage : 50;
        $paginated = new LengthAwarePaginator(
            $parents->forPage($page, $perPage)->values(),
            $parents->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $data = $paginated;

        return [
            'patient_treatments_done' => $data, // Transform the data using the resource
            'pagination' => [
                'currentPage' => $data->currentPage(),
                'perPage' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new patient treatments done record.
     *
     * @param array $data The validated data for creating the patient treatments done
     * @return PatientTreatmentsDone The newly created patient treatments done model
     */
    public function createTreatmentDone(array $data, Patient $patient): PatientTreatmentsDone
    {
        return DB::transaction(function () use ($data, $patient) {
            if(is_null($data['WaitingAreaID'])) {
                $patientTreatmentsDone = $patient->patient_treatments_done()->create([
                    'PatientID' => $patient->id,
                    'ProviderID' => $data['ProviderID'],
                    'ParentPatientTreatmentDoneID' => $data['ParentPatientTreatmentDoneID'],
                    'TreatmentPlanName' => $data['TreatmentPlanName'],
                    'TreatmentCost' => $data['TreatmentCost'],
                    'TreatmentDiscount' => $data['TreatmentDiscount'],
                    'TreatmentAddition' => $data['TreatmentAddition'],
                    'TreatmentTotalCost' => $data['TreatmentTotalCost'],
                    'TreatmentDate' => $data['TreatmentDate'],
                    'isPrimaryTooth' => $data['isPrimaryTooth'] ?? false,
                ]);

                $patientTreatmentsDone->treatment_type()->create([
                    'PatientTreatmentDoneID' => $patientTreatmentsDone->id,
                    'TreatmentTypeID' => $data['TreatmentTypeID'],
                    'TreatmentSubTypeID' => $data['TreatmentSubTypeID'],
                    'TeethTreatment' => $data['TeethTreatment'],
                    'TeethTreatmentNote' => $data['TeethTreatmentNote'],
                    'TreatmentCost' => $data['TreatmentCost'],
                    'TreatmentTotalCost' => $data['TreatmentTotalCost'],
                    'Discount' => $data['TreatmentDiscount'],
                    'Addition' => $data['TreatmentAddition'],
                ]);
            } else {
                $patientTreatmentsDone = $patient->patient_treatments_done()->create([
                    'PatientID' => $patient->id,
                    'ProviderID' => $data['ProviderID'],
                    'WaitingAreaID' => $data['WaitingAreaID'],
                    'TreatmentDate' => $data['TreatmentDate'] ?? Carbon::now(),
                ]);

                if ($patientTreatmentsDone->waiting_area) {
                    $patientTreatmentsDone->waiting_area->update(['MovedToTreatmentArea' => 1]);
                }
            }

            return $patientTreatmentsDone;
        });
    }

    /**
     * Update an existing patient treatments done record.
     *
     * @param string $patientTreatmentsDone The patient treatments done model to update
     * @param array $data The validated data for updating the patient treatments done
     * @return PatientTreatmentsDone The updated patient treatments done model
     */
    public function updateTreatmentDone($patientTreatmentsDone, array $data): PatientTreatmentsDone
    {
        $patientTreatments = PatientTreatmentsDone::where('PatientTreatmentDoneID', $patientTreatmentsDone)->first();
        if (!$patientTreatments) {
            throw new \Exception('PatientTreatmentsDone record not found.');
        }
        $patientTreatments->update($data);
        $patientTreatments->refresh();
        return $patientTreatments;
    }
}