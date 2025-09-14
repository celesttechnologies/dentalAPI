<?php

namespace App\Http\Controllers;

use App\Models\LookUpsMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\LookUpsMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\LookUpsMasterResource;
use App\Http\Requests\StoreLookUpsMasterRequest;
use App\Http\Requests\UpdateLookUpsMasterRequest;

class LookUpsMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private LookUpsMasterService $lookUpsMasterService)
    {
    }

    /**
     * @group LookUpsMaster
     *
     * @method GET
     *
     * List all lookupsmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookups_master": [
     *                 {
     *                     "lookup_master_id": 1,
     *                     "clinic_id": 1,
     *                     "item_category": "Example value",
     *                     "item_category_description": "Example value",
     *                     "is_deleted": true,
     *                     "importance": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value"
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
            $data = $this->lookUpsMasterService->getLookUpsMaster($perPage);

            return $this->successResponse([
                'lookups_master' => LookUpsMasterResource::collection($data['lookups']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching LookUps Master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group LookUpsMaster
     *
     * @method GET
     *
     * Create lookupsmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup_master": {
     *                 "lookup_master_id": 1,
     *                 "clinic_id": 1,
     *                 "item_category": "Example value",
     *                 "item_category_description": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpsMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group LookUpsMaster
     *
     * @method POST
     *
     * Create a new lookupsmaster
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemCategory string required. Example: "Example ItemCategory"
     * @bodyParam ItemCategoryDescription string required. Example: "Example ItemCategoryDescription"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam Importance string required. Example: "Example Importance"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup_master": {
     *                 "lookup_master_id": 1,
     *                 "clinic_id": 1,
     *                 "item_category": "Example value",
     *                 "item_category_description": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpsMasterResource
     */
    public function store(StoreLookUpsMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $lookupMaster = $this->lookUpsMasterService->createLookUpsMaster($validatedData);

            return $this->successResponse([
                'message' => 'LookUps Master created successfully',
                'lookup_master' => new LookUpsMasterResource($lookupMaster)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating LookUps Master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create LookUps Master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group LookUpsMaster
     *
     * @method GET
     *
     * Get a specific lookupsmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the lookupsmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup_master": {
     *                 "lookup_master_id": 1,
     *                 "clinic_id": 1,
     *                 "item_category": "Example value",
     *                 "item_category_description": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpsMasterResource
     */
    public function show(LookUpsMaster $lookUpsMaster)
    {
        //
    }

    /**
     * @group LookUpsMaster
     *
     * @method GET
     *
     * Edit lookupsmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the lookupsmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup_master": {
     *                 "lookup_master_id": 1,
     *                 "clinic_id": 1,
     *                 "item_category": "Example value",
     *                 "item_category_description": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpsMasterResource
     */
    public function edit(LookUpsMaster $lookUpsMaster)
    {
        //
    }

    /**
     * @group LookUpsMaster
     *
     * @method PUT
     *
     * Update an existing lookupsmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the lookupsmaster to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemCategory string optional. Example: "Example ItemCategory"
     * @bodyParam ItemCategoryDescription string optional. Example: "Example ItemCategoryDescription"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam Importance string optional. Example: "Example Importance"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup_master": {
     *                 "lookup_master_id": 1,
     *                 "clinic_id": 1,
     *                 "item_category": "Example value",
     *                 "item_category_description": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpsMasterResource
     */
    public function update(UpdateLookUpsMasterRequest $request, LookUpsMaster $lookUpsMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedLookupMaster = $this->lookUpsMasterService->updateLookUpsMaster($lookUpsMaster, $validatedData);

            return $this->successResponse([
                'message' => 'LookUps Master updated successfully',
                'lookup_master' => new LookUpsMasterResource($updatedLookupMaster)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating LookUps Master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update LookUps Master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group LookUpsMaster
     *
     * @method DELETE
     *
     * Delete a lookupsmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the lookupsmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LookUpsMaster $lookUpsMaster)
    {
        //
    }
}
