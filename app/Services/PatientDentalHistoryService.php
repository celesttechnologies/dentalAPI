<?php

namespace App\Services;

use App\Models\PatientDentalHistory;
use App\Http\Resources\PatientDentalHistoryResource;
use App\Models\Patient;

class PatientDentalHistoryService
{
    /**
     * Get a paginated list of Patient Dental Histories.
     *
     * @param int $perPage
     * @return array
     */
    public function getHistories(Patient $patient, int $perPage): array
    {
        $data = PatientDentalHistory::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'histories' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createDentalHistory(array $data): PatientDentalHistory
    {
        return PatientDentalHistory::create($data);
    }

    public function updateDentalHistory(PatientDentalHistory $pdh, array $data): PatientDentalHistory
    {
        $pdh->update($data);
        $pdh->fresh();

        return $pdh;
    }
}
