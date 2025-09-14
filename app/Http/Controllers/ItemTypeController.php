<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemTypeService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemTypeResource;
use App\Http\Requests\StoreItemTypeRequest;
use App\Http\Requests\UpdateItemTypeRequest;

class ItemTypeController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemTypeService $itemTypeService)
    {
    }

    /**
     * @group ItemType
     *
     * @method GET
     *
     * List all itemtype
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_types": [
     *                 {
     *                     "item_type_id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "parent_item_type_id": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->itemTypeService->getItemTypes($perPage);

            return $this->successResponse([
                'item_types' => ItemTypeResource::collection($data['types']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Item Types: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ItemType
     *
     * @method GET
     *
     * Create itemtype
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_type": {
     *                 "item_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_item_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemTypeResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemType
     *
     * @method POST
     *
     * Create a new itemtype
     *
     * @post /
     *
     * @bodyParam ItemTypeID string required. Maximum length: 255. Example: "Example ItemTypeID"
     * @bodyParam ClinicID string optional. nullable. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam ParentItemTypeID string optional. nullable. Maximum length: 255. Example: "Example ParentItemTypeID"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string required. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "item_type": {
     *                 "item_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_item_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemTypeResource
     */
    public function store(StoreItemTypeRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $itemType = $this->itemTypeService->createItemType($validatedData);

            return $this->successResponse([
                'message' => 'Item Type created successfully',
                'item_type' => new ItemTypeResource($itemType)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Item Type: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Item Type',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemType
     *
     * @method GET
     *
     * Get a specific itemtype
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemtype to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_type": {
     *                 "item_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_item_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemTypeResource
     */
    public function show(ItemType $itemType)
    {
        //
    }

    /**
     * @group ItemType
     *
     * @method GET
     *
     * Edit itemtype
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemtype to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_type": {
     *                 "item_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_item_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemTypeResource
     */
    public function edit(ItemType $itemType)
    {
        //
    }

    /**
     * @group ItemType
     *
     * @method PUT
     *
     * Update an existing itemtype
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemtype to update. Example: 1
     *
     * @bodyParam ItemTypeID string optional. Maximum length: 255. Example: "Example ItemTypeID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Maximum length: 255. Example: "Example Title"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam ParentItemTypeID string optional. nullable. Maximum length: 255. Example: "Example ParentItemTypeID"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_type": {
     *                 "item_type_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_item_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
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
     * @return ItemTypeResource
     */
    public function update(UpdateItemTypeRequest $request, ItemType $itemType)
    {
        try {
            $validatedData = $request->validated();

            $updatedItemType = $this->itemTypeService->updateItemType($itemType, $validatedData);

            return $this->successResponse([
                'message' => 'Item Type updated successfully',
                'item_type' => new ItemTypeResource($updatedItemType)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Item Type: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Item Type',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemType
     *
     * @method DELETE
     *
     * Delete a itemtype
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemtype to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemType $itemType)
    {
        //
    }
}
