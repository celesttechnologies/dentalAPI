<?php

namespace App\Services;

use App\Models\PatientExaminationDiagnosis;
use App\Http\Resources\PatientExaminationDiagnosisResource;
use App\Models\Patient;

class PatientExaminationDiagnosisService
{
    /**
     * Get a paginated list of Patient Examination Diagnoses.
     *
     * @param int $perPage
     * @return array
     */
    public function getDiagnoses(Patient $patient, int $perPage): array
    {
        $data = PatientExaminationDiagnosis::where(['PatientID' => $patient->id, 'IsDeleted' => 0])->paginate($perPage);

        return [
            'diagnoses' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    public function createDiagnosis(array $data): PatientExaminationDiagnosis
    {
        return PatientExaminationDiagnosis::create($data);
    }
    public function updateDiagnosis(PatientExaminationDiagnosis $diagnosis, array $data): PatientExaminationDiagnosis
    {
        $diagnosis->update($data);
        $diagnosis->fresh();
        
        return $diagnosis;
    }
}