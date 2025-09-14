<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemResource;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemService $itemService)
    {
    }

    /**
     * @group Item
     *
     * @method GET
     *
     * List all item
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "items": [
     *                 {
     *                     "item_id": 1,
     *                     "clinic_id": 1,
     *                     "item_type_id": 1,
     *                     "item_name": "Example Name",
     *                     "manufacturer": "Example value",
     *                     "description": "Example value",
     *                     "measure": "Example value",
     *                     "unit_of_measure": "Example value",
     *                     "internal_prescription": "Example value",
     *                     "minimum_quantity": "Example value",
     *                     "maximum_quantity": "Example value",
     *                     "reorder_quantity": "Example value",
     *                     "rate": "Example value",
     *                     "added_by": "Example value",
     *                     "added_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "is_deleted": true,
     *                     "row_guid": 1,
     *                     "location": "Example value",
     *                     "shelflife": "Example value"
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
            $data = $this->itemService->getItems($perPage);

            return $this->successResponse([
                'items' => ItemResource::collection($data['items']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Items: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group Item
     *
     * @method GET
     *
     * Create item
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item": {
     *                 "item_id": 1,
     *                 "clinic_id": 1,
     *                 "item_type_id": 1,
     *                 "item_name": "Example Name",
     *                 "manufacturer": "Example value",
     *                 "description": "Example value",
     *                 "measure": "Example value",
     *                 "unit_of_measure": "Example value",
     *                 "internal_prescription": "Example value",
     *                 "minimum_quantity": "Example value",
     *                 "maximum_quantity": "Example value",
     *                 "reorder_quantity": "Example value",
     *                 "rate": "Example value",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1,
     *                 "location": "Example value",
     *                 "shelflife": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Item
     *
     * @method POST
     *
     * Create a new item
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemTypeID string required. Maximum length: 255. Example: "Example ItemTypeID"
     * @bodyParam ItemName string required. Example: "Example ItemName"
     * @bodyParam Manufacturer string required. Example: "Example Manufacturer"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam Measure string required. Example: "Example Measure"
     * @bodyParam UnitOfMeasure string required. Example: "Example UnitOfMeasure"
     * @bodyParam InternalPrescription string required. Example: "Example InternalPrescription"
     * @bodyParam MinimumQuantity string required. Example: "Example MinimumQuantity"
     * @bodyParam MaximumQuantity string required. Example: "Example MaximumQuantity"
     * @bodyParam ReorderQuantity string required. Example: "Example ReorderQuantity"
     * @bodyParam Rate string required. Example: "Example Rate"
     * @bodyParam AddedBy string required. Example: "Example AddedBy"
     * @bodyParam AddedOn string required. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam Location string required. Example: "Example Location"
     * @bodyParam Shelflife string required. Example: "Example Shelflife"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "item": {
     *                 "item_id": 1,
     *                 "clinic_id": 1,
     *                 "item_type_id": 1,
     *                 "item_name": "Example Name",
     *                 "manufacturer": "Example value",
     *                 "description": "Example value",
     *                 "measure": "Example value",
     *                 "unit_of_measure": "Example value",
     *                 "internal_prescription": "Example value",
     *                 "minimum_quantity": "Example value",
     *                 "maximum_quantity": "Example value",
     *                 "reorder_quantity": "Example value",
     *                 "rate": "Example value",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1,
     *                 "location": "Example value",
     *                 "shelflife": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemResource
     */
    public function store(StoreItemRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $item = $this->itemService->createItem($validatedData);

            return $this->successResponse([
                'message' => 'Item created successfully',
                'item' => new ItemResource($item)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating item: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Item
     *
     * @method GET
     *
     * Get a specific item
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the item to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item": {
     *                 "item_id": 1,
     *                 "clinic_id": 1,
     *                 "item_type_id": 1,
     *                 "item_name": "Example Name",
     *                 "manufacturer": "Example value",
     *                 "description": "Example value",
     *                 "measure": "Example value",
     *                 "unit_of_measure": "Example value",
     *                 "internal_prescription": "Example value",
     *                 "minimum_quantity": "Example value",
     *                 "maximum_quantity": "Example value",
     *                 "reorder_quantity": "Example value",
     *                 "rate": "Example value",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1,
     *                 "location": "Example value",
     *                 "shelflife": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemResource
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * @group Item
     *
     * @method GET
     *
     * Edit item
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the item to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item": {
     *                 "item_id": 1,
     *                 "clinic_id": 1,
     *                 "item_type_id": 1,
     *                 "item_name": "Example Name",
     *                 "manufacturer": "Example value",
     *                 "description": "Example value",
     *                 "measure": "Example value",
     *                 "unit_of_measure": "Example value",
     *                 "internal_prescription": "Example value",
     *                 "minimum_quantity": "Example value",
     *                 "maximum_quantity": "Example value",
     *                 "reorder_quantity": "Example value",
     *                 "rate": "Example value",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1,
     *                 "location": "Example value",
     *                 "shelflife": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemResource
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * @group Item
     *
     * @method PUT
     *
     * Update an existing item
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the item to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ItemTypeID string optional. Maximum length: 255. Example: "Example ItemTypeID"
     * @bodyParam ItemName string optional. Example: "Example ItemName"
     * @bodyParam Manufacturer string optional. Example: "Example Manufacturer"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam Measure string optional. Example: "Example Measure"
     * @bodyParam UnitOfMeasure string optional. Example: "Example UnitOfMeasure"
     * @bodyParam InternalPrescription string optional. Example: "Example InternalPrescription"
     * @bodyParam MinimumQuantity string optional. Example: "Example MinimumQuantity"
     * @bodyParam MaximumQuantity string optional. Example: "Example MaximumQuantity"
     * @bodyParam ReorderQuantity string optional. Example: "Example ReorderQuantity"
     * @bodyParam Rate string optional. Example: "Example Rate"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam Location string optional. Example: "Example Location"
     * @bodyParam Shelflife string optional. Example: "Example Shelflife"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item": {
     *                 "item_id": 1,
     *                 "clinic_id": 1,
     *                 "item_type_id": 1,
     *                 "item_name": "Example Name",
     *                 "manufacturer": "Example value",
     *                 "description": "Example value",
     *                 "measure": "Example value",
     *                 "unit_of_measure": "Example value",
     *                 "internal_prescription": "Example value",
     *                 "minimum_quantity": "Example value",
     *                 "maximum_quantity": "Example value",
     *                 "reorder_quantity": "Example value",
     *                 "rate": "Example value",
     *                 "added_by": "Example value",
     *                 "added_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1,
     *                 "location": "Example value",
     *                 "shelflife": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemResource
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        try {
            $validatedData = $request->validated();

            $updatedItem = $this->itemService->updateItem($item, $validatedData);

            return $this->successResponse([
                'message' => 'Item updated successfully',
                'item' => new ItemResource($updatedItem)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating item: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Item
     *
     * @method DELETE
     *
     * Delete a item
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the item to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
