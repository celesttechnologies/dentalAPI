<?php

namespace App\Services;

use App\Models\EcgDoctorIncentive;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\EcgDoctorIncentiveResource;

class EcgDoctorIncentiveService
{
    /**
     * Get a paginated list of ECG doctor incentives.
     *
     * @param int $perPage
     * @return array
     */
    public function getDoctorIncentives(int $perPage): array
    {
        // Fetch paginated data from the EcgDoctorIncentive model
        $data = EcgDoctorIncentive::paginate($perPage);

        return [
            'doctor_incentives' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new incentive record.
     *
     * @param array $data The validated data for creating the incentive
     * @return EcgDoctorIncentive The newly created incentive model
     */
    public function createIncentive(array $data): EcgDoctorIncentive
    {
        return EcgDoctorIncentive::create($data);
    }

    /**
     * Update an existing incentive record.
     *
     * @param EcgDoctorIncentive $ecgDoctorIncentive The incentive model to update
     * @param array $data The validated data for updating the incentive
     * @return EcgDoctorIncentive The updated incentive model
     */
    public function updateIncentive(EcgDoctorIncentive $ecgDoctorIncentive, array $data): EcgDoctorIncentive
    {
        $ecgDoctorIncentive->update($data);
        return $ecgDoctorIncentive;
    }
}
