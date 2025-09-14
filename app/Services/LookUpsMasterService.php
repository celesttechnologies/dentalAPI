<?php

namespace App\Services;

use App\Models\LookUpsMaster;
use App\Http\Resources\LookUpsMasterResource;

class LookUpsMasterService
{
    /**
     * Get a paginated list of LookUps Master.
     *
     * @param int $perPage
     * @return array
     */
    public function getLookUpsMaster(int $perPage): array
    {
        $data = LookUpsMaster::paginate($perPage);

        return [
            'lookups' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new lookup master record.
     *
     * @param array $data The validated data for creating the lookup
     * @return LookUp The newly created lookup model
     */
    public function createLookupsMaster(array $data): LookUpsMaster
    {
        return LookUpsMaster::create($data);
    }

    /**
     * Update an existing lookup master record.
     *
     * @param LookUpsMaster $lookup The lookup model to update
     * @param array $data The validated data for updating the lookup
     * @return LookUpsMaster The updated lookup model
     */
    public function updateLookupsMaster(LookUpsMaster $lookupMaster, array $data): LookUpsMaster
    {
        $lookupMaster->update($data);
        $lookupMaster->fresh();

        return $lookupMaster;
    }
}