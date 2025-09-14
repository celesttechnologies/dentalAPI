<?php

namespace App\Services;

use App\Models\PatientExamination;
use App\Http\Resources\PatientExaminationResource;
use App\Models\Patient;

class PatientExaminationService
{
    public function getExaminations(Patient $patient, int $perPage): array
    {
        $data = PatientExamination::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'examinations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    
    public function createExamination(array $data): PatientExamination
    {
        $diagnosisData = $data['diagnosis'] ?? [];
        unset($data['diagnosis']);
        $examination = PatientExamination::create($data);
        $diagnosisData['PatientExaminationID'] = $examination->PatientExaminationID;
        \App\Models\PatientExaminationDiagnosis::create($diagnosisData);
        return $examination;
    }

    public function updateExamination(PatientExamination $patientExamination, array $data): PatientExamination
    {
        $diagnosisData = $data['diagnosis'] ?? [];
        unset($data['diagnosis']);
        $patientExamination->update($data);
        $patientExamination->fresh();
        $patientExamination->diagnosis()->delete();
        $diagnosisData['PatientExaminationID'] = $patientExamination->PatientExaminationID;
        \App\Models\PatientExaminationDiagnosis::create($diagnosisData);
        return $patientExamination;
    }
}