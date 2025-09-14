<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseOrderDetailResource; // Assuming you have a resource for Purchase Order Detail
use App\Models\PurchaseOrderDetail;
use App\Services\PurchaseOrderDetailService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePurchaseOrderDetailRequest;
use App\Http\Requests\UpdatePurchaseOrderDetailRequest;

class PurchaseOrderDetailController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PurchaseOrderDetailService $orderDetailService)
    {
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method GET
     *
     * List all purchaseorderdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "purchase_order_details": [
     *                 {
     *                     "purchase_order_detail_id": 1,
     *                     "purchase_order_header_id": 1,
     *                     "item_id": 1,
     *                     "quantity": "Example value",
     *                     "rate": "Example value",
     *                     "amount": "Example value",
     *                     "manufacturing_date": "Example value",
     *                     "expiry_date": "Example value",
     *                     "batch_number": "Example value",
     *                     "batch_date": "Example value"
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
            $data = $this->orderDetailService->getPurchaseOrderDetails($perPage);

            return $this->successResponse([
                'purchase_order_details' => PurchaseOrderDetailResource::collection($data['purchase_order_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Purchase Order Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method GET
     *
     * Create purchaseorderdetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "orderDetail": {
     *                 "purchase_order_detail_id": 1,
     *                 "purchase_order_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "rate": "Example value",
     *                 "amount": "Example value",
     *                 "manufacturing_date": "Example value",
     *                 "expiry_date": "Example value",
     *                 "batch_number": "Example value",
     *                 "batch_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PurchaseOrderDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method POST
     *
     * Create a new purchaseorderdetail
     *
     * @post /
     *
     * @bodyParam PurchaseOrderHeaderId string required. Maximum length: 255. Example: "Example PurchaseOrderHeaderId"
     * @bodyParam ItemID string required. Maximum length: 255. Example: "Example ItemID"
     * @bodyParam Qty string required. Example: "Example Qty"
     * @bodyParam Rate string required. Example: "Example Rate"
     * @bodyParam Amount number required. numeric. Example: 1
     * @bodyParam ManufacturingDate string required. date. Example: "Example ManufacturingDate"
     * @bodyParam ExpiryDate string required. date. Example: "Example ExpiryDate"
     * @bodyParam BatchNumber string required. Example: "Example BatchNumber"
     * @bodyParam BatchDate string required. date. Example: "Example BatchDate"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "orderDetail": {
     *                 "purchase_order_detail_id": 1,
     *                 "purchase_order_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "rate": "Example value",
     *                 "amount": "Example value",
     *                 "manufacturing_date": "Example value",
     *                 "expiry_date": "Example value",
     *                 "batch_number": "Example value",
     *                 "batch_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PurchaseOrderDetailResource
     */
    public function store(StorePurchaseOrderDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $orderDetail = $this->orderDetailService->createOrderDetail($validatedData);

            return $this->successResponse([
                'message' => 'Purchase order detail created successfully',
                'orderDetail' => new PurchaseOrderDetailResource($orderDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating purchase order detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create purchase order detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method GET
     *
     * Get a specific purchaseorderdetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderdetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "orderDetail": {
     *                 "purchase_order_detail_id": 1,
     *                 "purchase_order_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "rate": "Example value",
     *                 "amount": "Example value",
     *                 "manufacturing_date": "Example value",
     *                 "expiry_date": "Example value",
     *                 "batch_number": "Example value",
     *                 "batch_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PurchaseOrderDetailResource
     */
    public function show(PurchaseOrderDetail $purchaseOrderDetail)
    {
        //
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method GET
     *
     * Edit purchaseorderdetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the purchaseorderdetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "orderDetail": {
     *                 "purchase_order_detail_id": 1,
     *                 "purchase_order_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "rate": "Example value",
     *                 "amount": "Example value",
     *                 "manufacturing_date": "Example value",
     *                 "expiry_date": "Example value",
     *                 "batch_number": "Example value",
     *                 "batch_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PurchaseOrderDetailResource
     */
    public function edit(PurchaseOrderDetail $purchaseOrderDetail)
    {
        //
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method PUT
     *
     * Update an existing purchaseorderdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderdetail to update. Example: 1
     *
     * @bodyParam PurchaseOrderHeaderId string optional. Maximum length: 255. Example: "Example PurchaseOrderHeaderId"
     * @bodyParam ItemID string optional. Maximum length: 255. Example: "Example ItemID"
     * @bodyParam Qty string optional. Example: "Example Qty"
     * @bodyParam Rate string optional. Example: "Example Rate"
     * @bodyParam Amount number optional. numeric. Example: 1
     * @bodyParam ManufacturingDate string optional. date. Example: "Example ManufacturingDate"
     * @bodyParam ExpiryDate string optional. date. Example: "Example ExpiryDate"
     * @bodyParam BatchNumber string optional. Example: "Example BatchNumber"
     * @bodyParam BatchDate string optional. date. Example: "Example BatchDate"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "orderDetail": {
     *                 "purchase_order_detail_id": 1,
     *                 "purchase_order_header_id": 1,
     *                 "item_id": 1,
     *                 "quantity": "Example value",
     *                 "rate": "Example value",
     *                 "amount": "Example value",
     *                 "manufacturing_date": "Example value",
     *                 "expiry_date": "Example value",
     *                 "batch_number": "Example value",
     *                 "batch_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PurchaseOrderDetailResource
     */
    public function update(UpdatePurchaseOrderDetailRequest $request, PurchaseOrderDetail $purchaseOrderDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedOrderDetail = $this->orderDetailService->updateOrderDetail($purchaseOrderDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Purchase order detail updated successfully',
                'orderDetail' => new PurchaseOrderDetailResource($updatedOrderDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating purchase order detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update purchase order detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PurchaseOrderDetail
     *
     * @method DELETE
     *
     * Delete a purchaseorderdetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderdetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderDetail $purchaseOrderDetail)
    {
        //
    }
}
