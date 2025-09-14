<?php

namespace App\Http\Controllers;

use App\Models\LookUp;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\LookUpResource;
use App\Http\Requests\StoreLookUpRequest;
use App\Http\Requests\UpdateLookUpRequest;
use App\Services\LookUpService;

class LookUpController extends Controller
{
    use ApiResponse;

    public function __construct(private LookUpService $lookUpService)
    {
    }

    /**
     * @group LookUp
     *
     * @method GET
     *
     * List all lookup
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookups": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "item_id": 1,
     *                     "item_title": "Example value",
     *                     "item_description": "Example value",
     *                     "item_category": "Example value",
     *                     "is_deleted": true,
     *                     "importance": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "row_guid": 1
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
    public function index(Request $request, $category = null)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->lookUpService->getLookUps($perPage, $category);

            return $this->successResponse([
                'lookups' => LookUpResource::collection($data['lookups']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching LookUps: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group LookUp
     *
     * @method GET
     *
     * Create lookup
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "item_id": 1,
     *                 "item_title": "Example value",
     *                 "item_description": "Example value",
     *                 "item_category": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpResource
     */
    public function create()
    {
        //
    }

    /**
     * @group LookUp
     *
     * @method POST
     *
     * Create a new lookup
     *
     * @post /
     *
     * @bodyParam id string required. Maximum length: 255. Example: "1"
     * @bodyParam ClinicID string optional. nullable. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemID number required. integer. Example: 1
     * @bodyParam ItemTitle string required. Maximum length: 255. Example: "Example ItemTitle"
     * @bodyParam ItemDescription string optional. nullable. Example: "Example ItemDescription"
     * @bodyParam ItemCategory string required. Maximum length: 255. Example: "Example ItemCategory"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam Importance number required. integer. Example: 1
     * @bodyParam LastUpdatedBy string required. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "item_id": 1,
     *                 "item_title": "Example value",
     *                 "item_description": "Example value",
     *                 "item_category": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpResource
     */
    public function store(StoreLookUpRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $lookUp = $this->lookUpService->createLookUp($validatedData);

            return $this->successResponse([
                'message' => 'LookUp created successfully',
                'lookup' => new LookUpResource($lookUp)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating lookup: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create lookup',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group LookUp
     *
     * @method GET
     *
     * Get a specific lookup
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the lookup to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "item_id": 1,
     *                 "item_title": "Example value",
     *                 "item_description": "Example value",
     *                 "item_category": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpResource
     */
    public function show(LookUp $lookUp)
    {
        //
    }

    /**
     * @group LookUp
     *
     * @method GET
     *
     * Edit lookup
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the lookup to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "item_id": 1,
     *                 "item_title": "Example value",
     *                 "item_description": "Example value",
     *                 "item_category": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpResource
     */
    public function edit(LookUp $lookUp)
    {
        //
    }

    /**
     * @group LookUp
     *
     * @method PUT
     *
     * Update an existing lookup
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the lookup to update. Example: 1
     *
     * @bodyParam id string optional. Maximum length: 255. Example: "1"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemID number optional. integer. Example: 1
     * @bodyParam ItemTitle string optional. Maximum length: 255. Example: "Example ItemTitle"
     * @bodyParam ItemDescription string optional. nullable. Example: "Example ItemDescription"
     * @bodyParam ItemCategory string optional. Maximum length: 255. Example: "Example ItemCategory"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam Importance number optional. integer. Example: 1
     * @bodyParam LastUpdatedBy string optional. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "lookup": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "item_id": 1,
     *                 "item_title": "Example value",
     *                 "item_description": "Example value",
     *                 "item_category": "Example value",
     *                 "is_deleted": true,
     *                 "importance": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return LookUpResource
     */
    public function update(UpdateLookUpRequest $request, LookUp $lookUp)
    {
        try {
            $validatedData = $request->validated();

            $updatedLookUp = $this->lookUpService->updateLookUp($lookUp, $validatedData);

            return $this->successResponse([
                'message' => 'LookUp updated successfully',
                'lookup' => new LookUpResource($updatedLookUp)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating lookup: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update lookup',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group LookUp
     *
     * @method DELETE
     *
     * Delete a lookup
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the lookup to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LookUp $lookUp)
    {
        //
    }
}
