<?php

namespace App\Services;

use App\Models\AspnetSchemaVersion;

class AspnetSchemaVersionService
{
    public function getAspnetSchemaVersions($perPage = 50)
    {
        $schemaVersions = AspnetSchemaVersion::paginate($perPage);

        return [
            'schemaVersions' => $schemaVersions,
            'pagination' => [
                'currentPage' => $schemaVersions->currentPage(),
                'perPage' => $schemaVersions->perPage(),
                'total' => $schemaVersions->total(),
            ]
        ];
    }

    /**
     * Create a new schema version record.
     *
     * @param array $data The validated data for creating the schema version
     * @return AspnetSchemaVersion The newly created schema version model
     */
    public function createSchemaVersion(array $data): AspnetSchemaVersion
    {
        return AspnetSchemaVersion::create($data);
    }

    /**
     * Update an existing schema version record.
     *
     * @param AspnetSchemaVersion $aspnetSchemaVersion The schema version model to update
     * @param array $data The validated data for updating the schema version
     * @return AspnetSchemaVersion The updated schema version model
     */
    public function updateSchemaVersion(AspnetSchemaVersion $aspnetSchemaVersion, array $data): AspnetSchemaVersion
    {
        $aspnetSchemaVersion->update($data);
        $aspnetSchemaVersion->fresh();
        return $aspnetSchemaVersion;
    }
}