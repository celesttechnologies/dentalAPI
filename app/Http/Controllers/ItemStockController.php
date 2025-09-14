<?php

namespace App\Http\Controllers;

use App\Models\ItemStock;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ItemStockService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ItemStockResource;
use App\Http\Requests\StoreItemStockRequest;
use App\Http\Requests\UpdateItemStockRequest;

class ItemStockController extends Controller
{
    use ApiResponse;

    public function __construct(private ItemStockService $stockService)
    {
    }

    /**
     * @group ItemStock
     *
     * @method GET
     *
     * List all itemstock
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "item_stocks": [
     *                 {
     *                     "item_stock_id": 1,
     *                     "item_id": 1,
     *                     "quantity": "Example value",
     *                     "clinic_id": 1
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
            $data = $this->stockService->getItemStocks($perPage);

            return $this->successResponse([
                'item_stocks' => ItemStockResource::collection($data['stocks']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Item Stocks: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ItemStock
     *
     * @method GET
     *
     * Create itemstock
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "stock": {
     *                 "item_stock_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemStockResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ItemStock
     *
     * @method POST
     *
     * Create a new itemstock
     *
     * @post /
     *
     * @bodyParam ItemId string required. Maximum length: 255. Example: "Example ItemId"
     * @bodyParam Quantity string required. Example: "Example Quantity"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "stock": {
     *                 "item_stock_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemStockResource
     */
    public function store(StoreItemStockRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $stock = $this->stockService->createStock($validatedData);

            return $this->successResponse([
                'message' => 'Item stock created successfully',
                'stock' => new ItemStockResource($stock)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating item stock: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create item stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemStock
     *
     * @method GET
     *
     * Get a specific itemstock
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the itemstock to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "stock": {
     *                 "item_stock_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemStockResource
     */
    public function show(ItemStock $itemStock)
    {
        //
    }

    /**
     * @group ItemStock
     *
     * @method GET
     *
     * Edit itemstock
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the itemstock to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "stock": {
     *                 "item_stock_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemStockResource
     */
    public function edit(ItemStock $itemStock)
    {
        //
    }

    /**
     * @group ItemStock
     *
     * @method PUT
     *
     * Update an existing itemstock
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the itemstock to update. Example: 1
     *
     * @bodyParam ItemId string optional. Maximum length: 255. Example: "Example ItemId"
     * @bodyParam Quantity string optional. Example: "Example Quantity"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "stock": {
     *                 "item_stock_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ItemStockResource
     */
    public function update(UpdateItemStockRequest $request, ItemStock $itemStock)
    {
        try {
            $validatedData = $request->validated();

            $updatedStock = $this->stockService->updateStock($itemStock, $validatedData);

            return $this->successResponse([
                'message' => 'Item stock updated successfully',
                'stock' => new ItemStockResource($updatedStock)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating item stock: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update item stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ItemStock
     *
     * @method DELETE
     *
     * Delete a itemstock
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the itemstock to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemStock $itemStock)
    {
        //
    }
}
