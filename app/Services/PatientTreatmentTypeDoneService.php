<?php

namespace App\Services;

use App\Models\PatientTreatmentTypeDone; // Assuming you have a PatientTreatmentTypeDone model
use App\Http\Resources\PatientTreatmentTypeDoneResource; // Assuming you have a resource for Patient Treatment Type Done
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientTreatmentTypeDoneService
{
    /**
     * Get a paginated list of Patient Treatment Types Done.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientTreatmentTypesDone(Patient $patient, int $perPage): array
    {
        $data = PatientTreatmentTypeDone::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient treatment types done

        return [
            'patient_treatment_types_done' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                
            ]
        ];
    }

    /**
     * Create a new patient treatment type done record.
     *
     * @param array $data The validated data for creating the patient treatment type done
     * @return PatientTreatmentTypeDone The newly created patient treatment type done model
     */
    public function createTreatmentTypeDone(array $data): PatientTreatmentTypeDone
    {
        return PatientTreatmentTypeDone::create($data);
    }

    /**
     * Update an existing patient treatment type done record.
     *
     * @param PatientTreatmentTypeDone $patientTreatmentTypeDone The patient treatment type done model to update
     * @param array $data The validated data for updating the patient treatment type done
     * @return PatientTreatmentTypeDone The updated patient treatment type done model
     */
    public function updateTreatmentTypeDone(PatientTreatmentTypeDone $patientTreatmentTypeDone, array $data): PatientTreatmentTypeDone
    {
        $patientTreatmentTypeDone->update($data);
        return $patientTreatmentTypeDone;
    }
}