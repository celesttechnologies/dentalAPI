<?php

namespace App\Http\Controllers;

use App\Models\CacheLock; // Ensure this is the correct model
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\CacheLockService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Resources\CacheLockResource;
use App\Http\Requests\StoreCacheLockRequest;
use App\Http\Requests\UpdateCacheLockRequest;

class CacheLockController extends Controller
{
    use ApiResponse;

    public function __construct(
        private CacheLockService $cacheLockService // Ensure this service exists
    ) {
    }

    /**
     * @group CacheLock
     *
     * @method GET
     *
     * List all cachelock
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cacheLocks": [
     *                 {
     *                     "key": "Example value",
     *                     "owner": "Example value",
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

            $cacheLocks = $this->cacheLockService->getCacheLocks($perPage);

            return $this->successResponse([
                'cacheLocks' => CacheLockResource::collection($cacheLocks['cacheLocks']),
                'pagination' => $cacheLocks['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching cache locks: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group CacheLock
     *
     * @method GET
     *
     * Create cachelock
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache_lock": {
     *                 "key": "Example value",
     *                 "owner": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheLockResource
     */
    public function create()
    {
        //
    }

    /**
     * @group CacheLock
     *
     * @method POST
     *
     * Create a new cachelock
     *
     * @post /
     *
     * @bodyParam LockKey string required. Maximum length: 255. Example: "Example LockKey"
     * @bodyParam LockedBy string required. Maximum length: 255. Example: "Example LockedBy"
     * @bodyParam LockedOn string required. date. Example: "Example LockedOn"
     * @bodyParam ExpiresOn string required. date. Example: "Example ExpiresOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "cache_lock": {
     *                 "key": "Example value",
     *                 "owner": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheLockResource
     */
    public function store(StoreCacheLockRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $cacheLock = $this->cacheLockService->createCacheLock($validatedData);

            return $this->successResponse([
                'message' => 'Cache lock created successfully',
                'cache_lock' => new CacheLockResource($cacheLock)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating cache lock: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create cache lock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group CacheLock
     *
     * @method GET
     *
     * Get a specific cachelock
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cachelock to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache_lock": {
     *                 "key": "Example value",
     *                 "owner": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheLockResource
     */
    public function show(CacheLock $cacheLock)
    {
        //
    }

    /**
     * @group CacheLock
     *
     * @method GET
     *
     * Edit cachelock
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cachelock to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache_lock": {
     *                 "key": "Example value",
     *                 "owner": "Example value",
     *                 "expiration": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CacheLockResource
     */
    public function edit(CacheLock $cacheLock)
    {
        //
    }

    /**
     * @group CacheLock
     *
     * @method PUT
     *
     * Update an existing cachelock
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cachelock to update. Example: 1
     *
     * @bodyParam LockKey string optional. Maximum length: 255. Example: "Example LockKey"
     * @bodyParam LockedBy string optional. Maximum length: 255. Example: "Example LockedBy"
     * @bodyParam LockedOn string optional. date. Example: "Example LockedOn"
     * @bodyParam ExpiresOn string optional. date. Example: "Example ExpiresOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "cache_lock": {
     *                 "key": "Example value",
     *                 "owner": "Example value",
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
     * @return CacheLockResource
     */
    public function update(UpdateCacheLockRequest $request, CacheLock $cacheLock)
    {
        try {
            $validatedData = $request->validated();

            $updatedCacheLock = $this->cacheLockService->updateCacheLock($cacheLock, $validatedData);

            return $this->successResponse([
                'message' => 'Cache lock updated successfully',
                'cache_lock' => new CacheLockResource($updatedCacheLock)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating cache lock: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update cache lock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group CacheLock
     *
     * @method DELETE
     *
     * Delete a cachelock
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cachelock to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CacheLock $cacheLock)
    {
        //
    }
}
