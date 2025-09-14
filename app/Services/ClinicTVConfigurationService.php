<?php

namespace App\Services;

use App\Models\ClinicTVConfiguration;
use App\Http\Resources\ClinicTVConfigurationResource;

class ClinicTVConfigurationService
{
    public function getClinicTVConfigurations(int $perPage): array
    {
        // Fetch paginated data from the ClinicTVConfiguration model
        $data = ClinicTVConfiguration::paginate($perPage);

        return [
            'clinic_tv_configurations' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new clinic TV configuration record.
     *
     * @param array $data The validated data for creating the clinic TV configuration
     * @return ClinicTVConfiguration The newly created clinic TV configuration model
     */
    public function createClinicTVConfiguration(array $data): ClinicTVConfiguration
    {
        return ClinicTVConfiguration::create($data);
    }

    /**
     * Update an existing clinic TV configuration record.
     *
     * @param ClinicTVConfiguration $clinicTVConfiguration The clinic TV configuration model to update
     * @param array $data The validated data for updating the clinic TV configuration
     * @return ClinicTVConfiguration The updated clinic TV configuration model
     */
    public function updateClinicTVConfiguration(ClinicTVConfiguration $clinicTVConfiguration, array $data): ClinicTVConfiguration
    {
        $clinicTVConfiguration->update($data);
        return $clinicTVConfiguration;
    }
}