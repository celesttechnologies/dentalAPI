<?php

namespace App\Services;

use App\Models\PatientDrugsPrescription;
use App\Http\Resources\PatientDrugsPrescriptionResource;
use App\Models\Patient;

class PatientDrugsPrescriptionService
{
    /**
     * Get a paginated list of Patient Drugs Prescriptions.
     *
     * @param int $perPage
     * @return array
     */
    public function getPrescriptions(Patient $patient, int $perPage): array
    {
        $data = PatientDrugsPrescription::where('PatientID', $patient->id)->paginate($perPage); // Fetch all prescriptions

        return [
            'prescriptions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createPrescription(array $data): PatientDrugsPrescription
    {
        return PatientDrugsPrescription::create($data);
    }

    public function updatePrescription(PatientDrugsPrescription $prescription, array $data): PatientDrugsPrescription
    {
        $prescription->update($data);
        $prescription->fresh();

        return $prescription;
    }
}