<?php

namespace App\Services;

use App\Http\Resources\CacheResource; // Assuming you have a resource for this model
use App\Models\Cache;

class CacheService
{
    public function getCaches($perPage = 50)
    {
        // Fetch caches with pagination
        $caches = Cache::paginate($perPage);

        return [
            'caches' => $caches, // Format the response using the resource
            'pagination' => [
                'currentPage' => $caches->currentPage(),
                'perPage' => $caches->perPage(),
                'total' => $caches->total(),
            ]
        ];
    }

    /**
     * Create a new cache record.
     *
     * @param array $data The validated data for creating the cache
     * @return Cache The newly created cache model
     */
    public function createCache(array $data): Cache
    {
        return Cache::create($data);
    }

    /**
     * Update an existing cache record.
     *
     * @param Cache $cache The cache model to update
     * @param array $data The validated data for updating the cache
     * @return Cache The updated cache model
     */
    public function updateCache(Cache $cache, array $data): Cache
    {
        $cache->update($data);
        return $cache;
    }
}
