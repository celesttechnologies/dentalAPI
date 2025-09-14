<?php

namespace App\Services;

use App\Models\PatientPrescription; // Assuming you have a PatientPrescription model
use App\Http\Resources\PatientPrescriptionResource; // Assuming you have a resource for Patient Prescription
use App\Models\Patient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientPrescriptionService
{
    /**
     * Get a paginated list of Patient Prescriptions.
     *
     * @param int $perPage
     * @return array
     */
    public function getPatientPrescriptions(Patient $patient, int $perPage): array
    {
        $data = PatientPrescription::where('PatientID', $patient->id)->paginate($perPage); // Fetch paginated patient prescriptions

        return [
            'patient_prescriptions' => $data, // Transform the data using the resource
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
               
            ]
        ];
    }

    /**
     * Create a new patient prescription record.
     *
     * @param array $data The validated data for creating the patient prescription
     * @return PatientPrescription The newly created patient prescription model
     */
    public function createPrescription(array $data): PatientPrescription
    {
        return PatientPrescription::create($data);
    }

    /**
     * Update an existing patient prescription record.
     *
     * @param PatientPrescription $patientPrescription The patient prescription model to update
     * @param array $data The validated data for updating the patient prescription
     * @return PatientPrescription The updated patient prescription model
     */
    public function updatePrescription(PatientPrescription $patientPrescription, array $data): PatientPrescription
    {
        $patientPrescription->update($data);
        return $patientPrescription;
    }
}