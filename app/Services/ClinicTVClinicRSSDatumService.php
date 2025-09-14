<?php

namespace App\Services;

use App\Models\ClinicTVClinicRSSDatum;
use App\Http\Resources\ClinicTVClinicRSSDatumResource;

class ClinicTVClinicRSSDatumService
{
    public function getClinicTVClinicRSSData(int $perPage): array
    {
        // Fetch paginated data from the ClinicTVClinicRSSDatum model
        $data = ClinicTVClinicRSSDatum::paginate($perPage);

        return [
            'clinic_tv_clinic_rss_data' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_pages' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new clinic TV RSS data record.
     *
     * @param array $data The validated data for creating the clinic TV RSS data
     * @return ClinicTVClinicRSSDatum The newly created clinic TV RSS data model
     */
    public function createClinicTVClinicRSSData(array $data): ClinicTVClinicRSSDatum
    {
        return ClinicTVClinicRSSDatum::create($data);
    }

    /**
     * Update an existing clinic TV RSS data record.
     *
     * @param ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum The clinic TV RSS data model to update
     * @param array $data The validated data for updating the clinic TV RSS data
     * @return ClinicTVClinicRSSDatum The updated clinic TV RSS data model
     */
    public function updateClinicTVClinicRSSData(ClinicTVClinicRSSDatum $clinicTVClinicRSSDatum, array $data): ClinicTVClinicRSSDatum
    {
        $clinicTVClinicRSSDatum->update($data);
        return $clinicTVClinicRSSDatum;
    }
}
