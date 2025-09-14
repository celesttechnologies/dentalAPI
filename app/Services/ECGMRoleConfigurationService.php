<?php

namespace App\Services;

use App\Models\ECGMRoleConfiguration;
use App\Http\Resources\ECGMRoleConfigurationResource;

class ECGMRoleConfigurationService
{
    /**
     * Get a paginated list of ECGM role configurations.
     *
     * @param int $perPage
     * @return array
     */
    public function getRoleConfigurations(int $perPage): array
    {
        // Fetch paginated data from the ECGMRoleConfiguration model
        $data = ECGMRoleConfiguration::paginate($perPage);

        return [
            'role_configurations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createRoleConfiguration(array $data): ECGMRoleConfiguration
    {
        return ECGMRoleConfiguration::create($data);
    }

    public function updateRoleConfiguration(ECGMRoleConfiguration $eCGMRoleConfiguration, array $data): ECGMRoleConfiguration
    {
        $eCGMRoleConfiguration->update($data);
        $eCGMRoleConfiguration->fresh();

        return $eCGMRoleConfiguration;
    }
}