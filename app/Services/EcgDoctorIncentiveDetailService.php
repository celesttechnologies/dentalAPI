<?php

namespace App\Services;

use App\Models\EcgDoctorIncentiveDetail;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\EcgDoctorIncentiveDetailResource;

class EcgDoctorIncentiveDetailService
{
    /**
     * Get a paginated list of ECG doctor incentive details.
     *
     * @param int $perPage
     * @return array
     */
    public function getDoctorIncentiveDetails(int $perPage): array
    {
        // Fetch paginated data from the EcgDoctorIncentiveDetail model
        $data = EcgDoctorIncentiveDetail::paginate($perPage);

        return [
            'doctor_incentive_details' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new incentive detail record.
     *
     * @param array $data The validated data for creating the incentive detail
     * @return EcgDoctorIncentiveDetail The newly created incentive detail model
     */
    public function createIncentiveDetail(array $data): EcgDoctorIncentiveDetail
    {
        return EcgDoctorIncentiveDetail::create($data);
    }

    /**
     * Update an existing incentive detail record.
     *
     * @param EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail The incentive detail model to update
     * @param array $data The validated data for updating the incentive detail
     * @return EcgDoctorIncentiveDetail The updated incentive detail model
     */
    public function updateIncentiveDetail(EcgDoctorIncentiveDetail $ecgDoctorIncentiveDetail, array $data): EcgDoctorIncentiveDetail
    {
        $ecgDoctorIncentiveDetail->update($data);
        return $ecgDoctorIncentiveDetail;
    }
}
