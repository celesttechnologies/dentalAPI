<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\PatientHistory as PatientHistroy;

class PatientHistoryService
{
    /**
     * Get a paginated list of Patient Histories.
     *
     * @param int $perPage
     * @return array
     */
    public function getHistories(Patient $patient, int $perPage): array
    {
        $data = PatientHistroy::where('PatientID', $patient->id)->paginate($perPage) ;// Filter out deleted records

        return [
            'histories' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    public function createHistory(array $data): PatientHistroy
    {
        return PatientHistroy::create($data);
    }
    public function updateHistory(PatientHistroy $patientHistroy, array $data): PatientHistroy
    {
        $patientHistroy->update($data);
        $patientHistroy->fresh();

        return $patientHistroy;
    }
}