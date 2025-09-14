<?php

namespace App\Services;

use App\Models\DWSConfigProvider;
use App\Http\Resources\DWSConfigProviderResource;

class DWSConfigProviderService
{
    /**
     * Get a paginated list of providers.
     *
     * @param int $perPage
     * @return array
     */
    public function getProviders(int $perPage): array
    {
        // Fetch paginated data from the DWSConfigProvider model
        $data = DWSConfigProvider::paginate($perPage);

        return [
            'providers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new provider record.
     *
     * @param array $data The validated data for creating the provider
     * @return DWSConfigProvider The newly created provider model
     */
    public function createProvider(array $data): DWSConfigProvider
    {
        return DWSConfigProvider::create($data);
    }

    /**
     * Update an existing provider record.
     *
     * @param DWSConfigProvider $dWSConfigProvider The provider model to update
     * @param array $data The validated data for updating the provider
     * @return DWSConfigProvider The updated provider model
     */
    public function updateProvider(DWSConfigProvider $dWSConfigProvider, array $data): DWSConfigProvider
    {
        $dWSConfigProvider->update($data);
        return $dWSConfigProvider;
    }
}
