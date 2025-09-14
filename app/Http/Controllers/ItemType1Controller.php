<?php

namespace App\Http\Controllers;

use App\Models\ItemType1;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemType1Service;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemType1Resource;
use App\Http\Requests\StoreItemType1Request;
use App\Http\Requests\UpdateItemType1Request;

class ItemType1Controller extends Controller
{
    use ApiResponse;

    public function __construct(private ItemType1Service $itemTypeService)
    {
    }

    /**
     * @group ItemType1
     *
     * @method GET
     *
     * List all itemtype1
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_types": [
     *                 {
     *                     "item_type_id": 1,
     *                     "name": "Example Name",
     *                     "added_by": "Example value",
     *                     "added_on": "Example value",
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
            $data = $this->itemTypeService->getItemTypes($perPage);

            return $this->successResponse([
                'item_types' => ItemType1Resource::collection($data['types']),
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
     * @group ItemType1
     *
     * @method GET
     *
     * Create itemtype1
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "itemType": {
     *                 "item_type_id": 1,
     *                 "name": "Example Name",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemType1Resource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemType1
     *
     * @method POST
     *
     * Create a new itemtype1
     *
     * @post /
     *
     * @bodyParam ItemTypeID number required. integer. Example: 1
     * @bodyParam Name string required. Maximum length: 255. Example: "Example Name"
     * @bodyParam AddedBy string optional. nullable. Maximum length: 255. Example: "Example AddedBy"
     * @bodyParam AddedOn string required. date. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "itemType": {
     *                 "item_type_id": 1,
     *                 "name": "Example Name",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
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
     * @return ItemType1Resource
     */
    public function store(StoreItemType1Request $request)
    {
        try {
            $validatedData = $request->validated();

            $itemType = $this->itemTypeService->createItemType($validatedData);

            return $this->successResponse([
                'message' => 'Item type created successfully',
                'itemType' => new ItemType1Resource($itemType)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating item type: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create item type',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemType1
     *
     * @method GET
     *
     * Get a specific itemtype1
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemtype1 to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "itemType": {
     *                 "item_type_id": 1,
     *                 "name": "Example Name",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemType1Resource
     */
    public function show(ItemType1 $itemType1)
    {
        //
    }

    /**
     * @group ItemType1
     *
     * @method GET
     *
     * Edit itemtype1
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemtype1 to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "itemType": {
     *                 "item_type_id": 1,
     *                 "name": "Example Name",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemType1Resource
     */
    public function edit(ItemType1 $itemType1)
    {
        //
    }

    /**
     * @group ItemType1
     *
     * @method PUT
     *
     * Update an existing itemtype1
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemtype1 to update. Example: 1
     *
     * @bodyParam ItemTypeID number optional. integer. Example: 1
     * @bodyParam Name string optional. Maximum length: 255. Example: "Example Name"
     * @bodyParam AddedBy string optional. nullable. Maximum length: 255. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. date. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "itemType": {
     *                 "item_type_id": 1,
     *                 "name": "Example Name",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
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
     * @return ItemType1Resource
     */
    public function update(UpdateItemType1Request $request, ItemType1 $itemType1)
    {
        try {
            $validatedData = $request->validated();

            $updatedItemType = $this->itemTypeService->updateItemType($itemType1, $validatedData);

            return $this->successResponse([
                'message' => 'Item type updated successfully',
                'itemType' => new ItemType1Resource($updatedItemType)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating item type: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update item type',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemType1
     *
     * @method DELETE
     *
     * Delete a itemtype1
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemtype1 to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemType1 $itemType1)
    {
        //
    }
}
