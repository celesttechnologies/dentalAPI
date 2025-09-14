<?php

namespace App\Services;

use App\Models\PatientTreatmentsPlanDetail; // Assuming you have a PatientTreatmentsPlanDetail model
use App\Models\PatientTreatmentsPlanHeader; // Assuming you have a PatientTreatmentsPlanDetail model
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientTreatmentsPlanService
{
    /**
     * Get a paginated list of Patient Treatments Plan Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientTreatmentsPlanDetails(Patient $patient, int $perPage): array
    {
        $data = $patient->patient_treatments_plan_headers()->load('patient_treatments_plan_details')->paginate($perPage);
        // $data = PatientTreatmentsPlanDetail::whereHas('PatientTreatmentsPlanHeader', function ($query) use ($patient) {
        //     $query->where('PatientID', $patient->id);
        // })->paginate($perPage);

        return [
            'patient_treatments_plan_details' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    /**
     * Create a new treatments plan detail record.
     *
     * @param array $data The validated data for creating the treatments plan detail
     * @return PatientTreatmentsPlanDetail The newly created treatments plan detail model
     */
    public function createTreatmentsPlan(array $data, Patient $patient): PatientTreatmentsPlanHeader
    {
        return DB::transaction(function () use ($data, $patient) {
            $patientTreatmentsPlanHeader = $patient->patient_treatments_plan_headers()->create([
                'PatientID' => $patient->id,
                'ProviderID' => $data['ProviderID'],
                'TreatmentPlanName' => $data['TreatmentPlanName'],
                'TreatmentCost' => $data['TreatmentCost'],
                'TreatmentDiscount' => $data['TreatmentDiscount'],
                'TreatmentAddition' => $data['TreatmentAddition'],
                'TreatmentTotalCost' => $data['TreatmentTotalCost'],
                'TreatmentDate' => $data['TreatmentDate'],
            ]);

            // Prepare the array for batch insert
            $treatmentDetails = [];
            foreach ($data['TreatmentDetails'] as $treatmentDetail) {
                $treatmentDetails[] = [
                    'PatientTreatmentPlanHeaderID' => $patientTreatmentsPlanHeader->id,
                    'TreatmentTypeID' => $treatmentDetail['TreatmentTypeID'],
                    'TeethTreatment' => $treatmentDetail['TeethTreatment'],
                    'TeethTreatmentNote' => $treatmentDetail['TeethTreatmentNote'],
                    'TreatmentCost' => $treatmentDetail['TreatmentCost'],
                    'Discount' => $treatmentDetail['TreatmentDiscount'],
                    'Addition' => $treatmentDetail['TreatmentAddition'],
                ];
            }

            // Batch insert
            $patientTreatmentsPlanHeader->patient_treatments_plan_details()->insert($treatmentDetails);

            return $patientTreatmentsPlanHeader;
        });
    }

    /**
     * Update an existing treatments plan detail record.
     *
     * @param PatientTreatmentsPlanDetail $patientTreatmentsPlanDetail The treatments plan detail model to update
     * @param array $data The validated data for updating the treatments plan detail
     * @return PatientTreatmentsPlanDetail The updated treatments plan detail model
     */
    public function updateTreatmentsPlanDetail(PatientTreatmentsPlanDetail $patientTreatmentsPlanDetail, array $data): PatientTreatmentsPlanDetail
    {
        $patientTreatmentsPlanDetail->update($data);
        return $patientTreatmentsPlanDetail;
    }
}
