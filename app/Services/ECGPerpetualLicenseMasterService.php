<?php

namespace App\Services;

use App\Models\ECGPerpetualLicenseMaster;
use App\Http\Resources\ECGPerpetualLicenseMasterResource;

class ECGPerpetualLicenseMasterService
{
    /**
     * Get a paginated list of ECG Perpetual License Masters.
     *
     * @param int $perPage
     * @return array
     */
    public function getLicenseMasters(int $perPage): array
    {
        // Fetch paginated data from the ECGPerpetualLicenseMaster model
        $data = ECGPerpetualLicenseMaster::paginate($perPage);

        return [
            'license_masters' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createLicense(array $data): ECGPerpetualLicenseMaster
    {
        return ECGPerpetualLicenseMaster::create($data);
    }

    public function updateLicense(ECGPerpetualLicenseMaster $license, array $data): ECGPerpetualLicenseMaster
    {
        $license->update($data);
        $license->fresh();
        return $license;
    }
}