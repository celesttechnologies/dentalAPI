<?php

namespace App\Services;

use App\Models\PatientDiagnosis;
use App\Http\Resources\PatientDiagnosisResource;
use App\Models\Patient;

class PatientDiagnosisService
{
    /**
     * Get a paginated list of Patient Diagnoses.
     *
     * @param int $perPage
     * @return array
     */
    public function getDiagnoses(Patient $patient, int $perPage = 50): array
    {
        $data = PatientDiagnosis::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'diagnoses' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createDiagnosis(array $data): PatientDiagnosis
    {
        return PatientDiagnosis::create($data);
    }

    public function updateDiagnosis(PatientDiagnosis $diagnosis, array $data): PatientDiagnosis
    {
        $diagnosis->update($data);
        $diagnosis->fresh();

        return $diagnosis;
    }
}