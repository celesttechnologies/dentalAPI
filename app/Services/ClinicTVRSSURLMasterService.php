<?php

namespace App\Services;

use App\Models\ClinicTVRSSURLMaster;
use App\Http\Resources\ClinicTVRSSURLMasterResource;

class ClinicTVRSSURLMasterService
{
    public function getClinicTVRSSURLs(int $perPage): array
    {
        // Fetch paginated data from the ClinicTVRSSURLMaster model
        $data = ClinicTVRSSURLMaster::paginate($perPage);

        return [
            'clinic_tv_rss_urls' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new RSS URL master record.
     *
     * @param array $data The validated data for creating the RSS URL master
     * @return ClinicTVRSSURLMaster The newly created RSS URL master model
     */
    public function createRSSURLMaster(array $data): ClinicTVRSSURLMaster
    {
        return ClinicTVRSSURLMaster::create($data);
    }

    /**
     * Update an existing RSS URL master record.
     *
     * @param ClinicTVRSSURLMaster $clinicTVRSSURLMaster The RSS URL master model to update
     * @param array $data The validated data for updating the RSS URL master
     * @return ClinicTVRSSURLMaster The updated RSS URL master model
     */
    public function updateRSSURLMaster(ClinicTVRSSURLMaster $clinicTVRSSURLMaster, array $data): ClinicTVRSSURLMaster
    {
        $clinicTVRSSURLMaster->update($data);
        return $clinicTVRSSURLMaster;
    }
}
