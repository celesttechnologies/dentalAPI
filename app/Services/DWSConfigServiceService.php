<?php

namespace App\Services;

use App\Models\DWSConfigService;
use App\Http\Resources\DWSConfigServiceResource;

class DWSConfigServiceService
{
    /**
     * Get a paginated list of services.
     *
     * @param int $perPage
     * @return array
     */
    public function getServices(int $perPage): array
    {
        // Fetch paginated data from the DWSConfigService model
        $data = DWSConfigService::paginate($perPage);

        return [
            'services' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new service record.
     *
     * @param array $data The validated data for creating the service
     * @return DWSConfigService The newly created service model
     */
    public function createService(array $data): DWSConfigService
    {
        return DWSConfigService::create($data);
    }

    /**
     * Update an existing service record.
     *
     * @param DWSConfigService $dWSConfigService The service model to update
     * @param array $data The validated data for updating the service
     * @return DWSConfigService The updated service model
     */
    public function updateService(DWSConfigService $dWSConfigService, array $data): DWSConfigService
    {
        $dWSConfigService->update($data);
        return $dWSConfigService;
    }
}