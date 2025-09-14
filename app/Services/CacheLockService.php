<?php

namespace App\Services;

use App\Http\Resources\CacheLockResource; // Assuming you have a resource for this model
use App\Models\CacheLock;

class CacheLockService
{
    public function getCacheLocks($perPage = 50)
    {
        // Fetch cache locks with pagination
        $cacheLocks = CacheLock::paginate($perPage);

        return [
            'cacheLocks' => $cacheLocks, // Format the response using the resource
            'pagination' => [
                'currentPage' => $cacheLocks->currentPage(),
                'perPage' => $cacheLocks->perPage(),
                'total' => $cacheLocks->total(),
            ]
        ];
    }

    /**
     * Create a new cache lock record.
     *
     * @param array $data The validated data for creating the cache lock
     * @return CacheLock The newly created cache lock model
     */
    public function createCacheLock(array $data): CacheLock
    {
        return CacheLock::create($data);
    }

    /**
     * Update an existing cache lock record.
     *
     * @param CacheLock $cacheLock The cache lock model to update
     * @param array $data The validated data for updating the cache lock
     * @return CacheLock The updated cache lock model
     */
    public function updateCacheLock(CacheLock $cacheLock, array $data): CacheLock
    {
        $cacheLock->update($data);
        return $cacheLock;
    }
}
