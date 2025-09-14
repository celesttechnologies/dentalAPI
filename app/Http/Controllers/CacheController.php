<?php

namespace App\Http\Controllers;

use App\Models\Cache; // Ensure this is the correct model
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\CacheService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Resources\CacheResource;
use App\Http\Requests\StoreCacheRequest;
use App\Http\Requests\UpdateCacheRequest;

class CacheController extends Controller
{
    use ApiResponse;

    public function __construct(
        private CacheService $cacheService // Ensure this service exists
    ) {
    }

    /**
     * @group Cache
     *
     * @method GET
     *
     * List all cache
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "caches": [
     *                 {
     *                     "key": "Example value",
     *                     "value": "Example value",
     *                     "expiration": "Example value"
     *                 }
     *             ],
     *             "pagination": {
     *                 "current_page": 1,
     *                 "per_pages": 50,
     *                 "total": 100
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));

            $caches = $this->cacheService->getCaches($perPage);

            return $this->successResponse([
                'caches' => CacheResource::collection($caches['caches']),
                'pagination' => $caches['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching caches: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group Cache
     *
     * @method GET
     *
     * Create cache
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache": {
     *                 "key": "Example value",
     *                 "value": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Cache
     *
     * @method POST
     *
     * Create a new cache
     *
     * @post /
     *
     * @bodyParam CacheKey string required. Maximum length: 255. Example: "Example CacheKey"
     * @bodyParam CacheValue string required. Example: "Example CacheValue"
     * @bodyParam Expiry string required. date. Example: "Example Expiry"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "cache": {
     *                 "key": "Example value",
     *                 "value": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheResource
     */
    public function store(StoreCacheRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $cache = $this->cacheService->createCache($validatedData);

            return $this->successResponse([
                'message' => 'Cache created successfully',
                'cache' => new CacheResource($cache)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating cache: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create cache',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Cache
     *
     * @method GET
     *
     * Get a specific cache
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cache to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache": {
     *                 "key": "Example value",
     *                 "value": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheResource
     */
    public function show(Cache $cache)
    {
        //
    }

    /**
     * @group Cache
     *
     * @method GET
     *
     * Edit cache
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cache to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache": {
     *                 "key": "Example value",
     *                 "value": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheResource
     */
    public function edit(Cache $cache)
    {
        //
    }

    /**
     * @group Cache
     *
     * @method PUT
     *
     * Update an existing cache
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cache to update. Example: 1
     *
     * @bodyParam CacheKey string optional. Maximum length: 255. Example: "Example CacheKey"
     * @bodyParam CacheValue string optional. Example: "Example CacheValue"
     * @bodyParam Expiry string optional. date. Example: "Example Expiry"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache": {
     *                 "key": "Example value",
     *                 "value": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheResource
     */
    public function update(UpdateCacheRequest $request, Cache $cache)
    {
        try {
            $validatedData = $request->validated();

            $updatedCache = $this->cacheService->updateCache($cache, $validatedData);

            return $this->successResponse([
                'message' => 'Cache updated successfully',
                'cache' => new CacheResource($updatedCache)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating cache: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update cache',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Cache
     *
     * @method DELETE
     *
     * Delete a cache
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cache to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cache $cache)
    {
        //
    }
}
