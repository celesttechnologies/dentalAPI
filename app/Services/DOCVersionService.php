<?php

namespace App\Services;

use App\Models\DOCVersion;
use App\Http\Resources\DOCVersionResource;

class DOCVersionService
{
    /**
     * Get a paginated list of DOC versions.
     *
     * @param int $perPage
     * @return array
     */
    public function getDOCVersions(int $perPage): array
    {
        // Fetch paginated data from the DOCVersion model
        $data = DOCVersion::paginate($perPage);

        return [
            'doc_versions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new DOC version record.
     *
     * @param array $data The validated data for creating the DOC version
     * @return DOCVersion The newly created DOC version model
     */
    public function createDOCVersion(array $data): DOCVersion
    {
        return DOCVersion::create($data);
    }

    /**
     * Update an existing DOC version record.
     *
     * @param DOCVersion $dOCVersion The DOC version model to update
     * @param array $data The validated data for updating the DOC version
     * @return DOCVersion The updated DOC version model
     */
    public function updateDOCVersion(DOCVersion $dOCVersion, array $data): DOCVersion
    {
        $dOCVersion->update($data);
        return $dOCVersion;
    }
}