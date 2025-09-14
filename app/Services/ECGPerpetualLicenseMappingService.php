<?php

namespace App\Services;

use App\Models\ECGPerpetualLicenseMapping;
use App\Http\Resources\ECGPerpetualLicenseMappingResource;

class ECGPerpetualLicenseMappingService
{
    /**
     * Get a paginated list of ECG Perpetual License Mappings.
     *
     * @param int $perPage
     * @return array
     */
    public function getLicenseMappings(int $perPage): array
    {
        // Fetch paginated data from the ECGPerpetualLicenseMapping model
        $data = ECGPerpetualLicenseMapping::paginate($perPage);

        return [
            'license_mappings' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createLicenseMapping(array $data): ECGPerpetualLicenseMapping
    {
        return ECGPerpetualLicenseMapping::create($data);
    }

    public function updateLicenseMapping(ECGPerpetualLicenseMapping $mapping, array $data): ECGPerpetualLicenseMapping
    {
        $mapping->update($data);
        $mapping->fresh();
        return $mapping;
    }
}