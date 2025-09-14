<?php

namespace App\Http\Controllers;

use App\Models\ItemsHierarchy;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemsHierarchyService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemsHierarchyResource;
use App\Http\Requests\StoreItemsHierarchyRequest;
use App\Http\Requests\UpdateItemsHierarchyRequest;

class ItemsHierarchyController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemsHierarchyService $hierarchyService)
    {
    }

    /**
     * @group ItemsHierarchy
     *
     * @method GET
     *
     * List all itemshierarchy
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "items_hierarchy": [
     *                 {
     *                     "item_type_id": 1,
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
            $data = $this->hierarchyService->getItemsHierarchy($perPage);

            return $this->successResponse([
                'items_hierarchy' => ItemsHierarchyResource::collection($data['hierarchy']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Items Hierarchy: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ItemsHierarchy
     *
     * @method GET
     *
     * Create itemshierarchy
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "item_type_id": 1,
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
     * @return ItemsHierarchyResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemsHierarchy
     *
     * @method POST
     *
     * Create a new itemshierarchy
     *
     * @post /
     *
     * @bodyParam ItemTypeID string required. Maximum length: 255. Example: "Example ItemTypeID"
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
     *             "hierarchy": {
     *                 "item_type_id": 1,
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
     * @return ItemsHierarchyResource
     */
    public function store(StoreItemsHierarchyRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $hierarchy = $this->hierarchyService->createHierarchy($validatedData);

            return $this->successResponse([
                'message' => 'Items hierarchy created successfully',
                'hierarchy' => new ItemsHierarchyResource($hierarchy)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating items hierarchy: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create items hierarchy',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemsHierarchy
     *
     * @method GET
     *
     * Get a specific itemshierarchy
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemshierarchy to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "item_type_id": 1,
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
     * @return ItemsHierarchyResource
     */
    public function show(ItemsHierarchy $itemsHierarchy)
    {
        //
    }

    /**
     * @group ItemsHierarchy
     *
     * @method GET
     *
     * Edit itemshierarchy
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemshierarchy to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "hierarchy": {
     *                 "item_type_id": 1,
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
     * @return ItemsHierarchyResource
     */
    public function edit(ItemsHierarchy $itemsHierarchy)
    {
        //
    }

    /**
     * @group ItemsHierarchy
     *
     * @method PUT
     *
     * Update an existing itemshierarchy
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemshierarchy to update. Example: 1
     *
     * @bodyParam ItemTypeID string optional. Maximum length: 255. Example: "Example ItemTypeID"
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
     *             "hierarchy": {
     *                 "item_type_id": 1,
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
     * @return ItemsHierarchyResource
     */
    public function update(UpdateItemsHierarchyRequest $request, ItemsHierarchy $itemsHierarchy)
    {
        try {
            $validatedData = $request->validated();

            $updatedHierarchy = $this->hierarchyService->updateHierarchy($itemsHierarchy, $validatedData);

            return $this->successResponse([
                'message' => 'Items hierarchy updated successfully',
                'hierarchy' => new ItemsHierarchyResource($updatedHierarchy)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating items hierarchy: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update items hierarchy',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemsHierarchy
     *
     * @method DELETE
     *
     * Delete a itemshierarchy
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemshierarchy to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsHierarchy $itemsHierarchy)
    {
        //
    }
}
