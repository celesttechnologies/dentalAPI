<?php

namespace App\Http\Controllers;

use App\Models\AspnetSchemaVersion;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetSchemaVersionService; // Make sure to create this service
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AspnetSchemaVersionResource;
use App\Http\Requests\StoreAspnetSchemaVersionRequest;
use App\Http\Requests\UpdateAspnetSchemaVersionRequest;

class AspnetSchemaVersionController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AspnetSchemaVersionService $aspnetSchemaVersionService // Ensure this service exists
    ) {
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method GET
     *
     * List all aspnetschemaversion
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "schemaVersions": [
     *                 {
     *                     "feature": "Example value",
     *                     "compatible_schema_version": "Example value",
     *                     "is_current_version": true
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

            $schemaVersions = $this->aspnetSchemaVersionService->getAspnetSchemaVersions($perPage);

            return $this->successResponse([
                'schemaVersions' => AspnetSchemaVersionResource::collection($schemaVersions['schemaVersions']),
                'pagination' => $schemaVersions['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching schema versions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method GET
     *
     * Create aspnetschemaversion
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "schema_version": {
     *                 "feature": "Example value",
     *                 "compatible_schema_version": "Example value",
     *                 "is_current_version": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetSchemaVersionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method POST
     *
     * Create a new aspnetschemaversion
     *
     * @post /
     *
     * @bodyParam CompatibleSchemaVersion string required. Maximum length: 50. Example: "Example CompatibleSchemaVersion"
     * @bodyParam IsCurrentVersion boolean required. Example: true
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "schema_version": {
     *                 "feature": "Example value",
     *                 "compatible_schema_version": "Example value",
     *                 "is_current_version": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetSchemaVersionResource
     */
    public function store(StoreAspnetSchemaVersionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $schemaVersion = $this->aspnetSchemaVersionService->createSchemaVersion($validatedData);

            return $this->successResponse([
                'message' => 'Schema version created successfully',
                'schema_version' => new AspnetSchemaVersionResource($schemaVersion)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating schema version: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create schema version',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method GET
     *
     * Get a specific aspnetschemaversion
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetschemaversion to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "schema_version": {
     *                 "feature": "Example value",
     *                 "compatible_schema_version": "Example value",
     *                 "is_current_version": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetSchemaVersionResource
     */
    public function show(AspnetSchemaVersion $aspnetSchemaVersion)
    {
        //
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method GET
     *
     * Edit aspnetschemaversion
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetschemaversion to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "schema_version": {
     *                 "feature": "Example value",
     *                 "compatible_schema_version": "Example value",
     *                 "is_current_version": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetSchemaVersionResource
     */
    public function edit(AspnetSchemaVersion $aspnetSchemaVersion)
    {
        //
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method PUT
     *
     * Update an existing aspnetschemaversion
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetschemaversion to update. Example: 1
     *
     * @bodyParam CompatibleSchemaVersion string optional. Maximum length: 50. Example: "Example CompatibleSchemaVersion"
     * @bodyParam IsCurrentVersion boolean optional. Example: true
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "schema_version": {
     *                 "feature": "Example value",
     *                 "compatible_schema_version": "Example value",
     *                 "is_current_version": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetSchemaVersionResource
     */
    public function update(UpdateAspnetSchemaVersionRequest $request, AspnetSchemaVersion $aspnetSchemaVersion)
    {
        try {
            $validatedData = $request->validated();

            $updatedSchemaVersion = $this->aspnetSchemaVersionService->updateSchemaVersion($aspnetSchemaVersion, $validatedData);

            return $this->successResponse([
                'message' => 'Schema version updated successfully',
                'schema_version' => new AspnetSchemaVersionResource($updatedSchemaVersion)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating schema version: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update schema version',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetSchemaVersion
     *
     * @method DELETE
     *
     * Delete a aspnetschemaversion
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetschemaversion to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetSchemaVersion $aspnetSchemaVersion)
    {
        //
    }
}
