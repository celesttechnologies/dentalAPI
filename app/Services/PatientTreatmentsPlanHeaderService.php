<?php

namespace App\Services;

use App\Models\PatientTreatmentsPlanHeader; // Assuming you have a PatientTreatmentsPlanHeader model
use App\Http\Resources\PatientTreatmentsPlanHeaderResource; // Assuming you have a resource for Patient Treatments Plan Header
use App\Models\Patient;

class PatientTreatmentsPlanHeaderService
{
    /**
     * Get a paginated list of Patient Treatments Plan Headers.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientTreatmentsPlanHeaders(Patient $patient, int $perPage): array
    {
        $data = PatientTreatmentsPlanHeader::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient treatments plan headers

        return [
            'patient_treatments_plan_headers' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    public function createTreatmentsPlanHeader(array $data): PatientTreatmentsPlanHeader
    {
        return PatientTreatmentsPlanHeader::create($data); // Create a new patient treatments plan header with the provided data
    }

   
    public function updateTreatmentsPlanHeader(PatientTreatmentsPlanHeader $planHeader , array $data): PatientTreatmentsPlanHeader
    {
        $planHeader->update($data); // Update the plan header with the provided data
        $planHeader->fresh();
        
        return $planHeader; // Return the updated plan header
    }

   
}
