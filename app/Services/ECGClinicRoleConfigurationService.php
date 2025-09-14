<?php

namespace App\Services;

use App\Models\ECGClinicRoleConfiguration;
use App\Http\Resources\ECGClinicRoleConfigurationResource;

class ECGClinicRoleConfigurationService
{
    /**
     * Get a paginated list of clinic role configurations.
     *
     * @param int $perPage
     * @return array
     */
    public function getRoleConfigurations(int $perPage): array
    {
        // Fetch paginated data from the ECGClinicRoleConfiguration model
        $data = ECGClinicRoleConfiguration::paginate($perPage);

        return [
            'role_configurations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * create a clinic role configurations.
     *
     * @param array $data The validated data for creating the event
     * @return ECGClinicRoleConfiguration The newly created event model
     */
    public function createConfiguration(array $data): ECGClinicRoleConfiguration
    {
        return ECGClinicRoleConfiguration::create($data);
    }

    /**
     * update a clinic role configurations.
     *
     * @param ECGClinicRoleConfiguration $ecgActivityEvent The event model to update
     * @param array $data The validated data for updating the event
     * @return ECGClinicRoleConfiguration The updated event model
     */
    public function updateConfiguration(ECGClinicRoleConfiguration $request, array $data): ECGClinicRoleConfiguration
    {
        $request->update($data);
        $request->fresh($data);
        return $request;
    }
}