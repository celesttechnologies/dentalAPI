<?php

namespace App\Services;

use App\Models\DWSConfigWebsite;
use App\Http\Resources\DWSConfigWebsiteResource;

class DWSConfigWebsiteService
{
    /**
     * Get a paginated list of websites.
     *
     * @param int $perPage
     * @return array
     */
    public function getWebsites(int $perPage): array
    {
        // Fetch paginated data from the DWSConfigWebsite model
        $data = DWSConfigWebsite::paginate($perPage);

        return [
            'websites' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new website configuration record.
     *
     * @param array $data The validated data for creating the website configuration
     * @return DWSConfigWebsite The newly created website configuration model
     */
    public function createWebsiteConfig(array $data): DWSConfigWebsite
    {
        return DWSConfigWebsite::create($data);
    }

    /**
     * Update an existing website configuration record.
     *
     * @param DWSConfigWebsite $dWSConfigWebsite The website configuration model to update
     * @param array $data The validated data for updating the website configuration
     * @return DWSConfigWebsite The updated website configuration model
     */
    public function updateWebsiteConfig(DWSConfigWebsite $dWSConfigWebsite, array $data): DWSConfigWebsite
    {
        $dWSConfigWebsite->update($data);
        return $dWSConfigWebsite;
    }
}
