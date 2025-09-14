<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalesOrderDetailResource; // Assuming you have a resource for Sales Order Detail
use App\Models\SalesOrderDetail;
use App\Services\SalesOrderDetailService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSalesOrderDetailRequest;
use App\Http\Requests\UpdateSalesOrderDetailRequest;

class SalesOrderDetailController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private SalesOrderDetailService $salesOrderDetailService)
    {
    }

    /**
     * @group SalesOrderDetail
     *
     * @method GET
     *
     * List all salesorderdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_details": [
     *                 {
     *                     "sales_order_detail_id": 1,
     *                     "sales_order_header_id": 1,
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
            $data = $this->salesOrderDetailService->getSalesOrderDetails($perPage);

            return $this->successResponse([
                'sales_order_details' => SalesOrderDetailResource::collection($data['sales_order_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Sales Order Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group SalesOrderDetail
     *
     * @method GET
     *
     * Create salesorderdetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_detail": {
     *                 "sales_order_detail_id": 1,
     *                 "sales_order_header_id": 1,
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
     * @return SalesOrderDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SalesOrderDetail
     *
     * @method POST
     *
     * Create a new salesorderdetail
     *
     * @post /
     *
     * @bodyParam SalesOrderHeaderId string required. Maximum length: 255. Example: "Example SalesOrderHeaderId"
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
     *             "sales_order_detail": {
     *                 "sales_order_detail_id": 1,
     *                 "sales_order_header_id": 1,
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
     * @return SalesOrderDetailResource
     */
    public function store(StoreSalesOrderDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $salesOrderDetail = $this->salesOrderDetailService->createSalesOrderDetail($validatedData);

            return $this->successResponse([
                'message' => 'Sales order detail created successfully',
                'sales_order_detail' => new SalesOrderDetailResource($salesOrderDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating sales order detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create sales order detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SalesOrderDetail
     *
     * @method GET
     *
     * Get a specific salesorderdetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the salesorderdetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_detail": {
     *                 "sales_order_detail_id": 1,
     *                 "sales_order_header_id": 1,
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
     * @return SalesOrderDetailResource
     */
    public function show(SalesOrderDetail $salesOrderDetail)
    {
        //
    }

    /**
     * @group SalesOrderDetail
     *
     * @method GET
     *
     * Edit salesorderdetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the salesorderdetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_detail": {
     *                 "sales_order_detail_id": 1,
     *                 "sales_order_header_id": 1,
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
     * @return SalesOrderDetailResource
     */
    public function edit(SalesOrderDetail $salesOrderDetail)
    {
        //
    }

    /**
     * @group SalesOrderDetail
     *
     * @method PUT
     *
     * Update an existing salesorderdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the salesorderdetail to update. Example: 1
     *
     * @bodyParam SalesOrderHeaderId string optional. Maximum length: 255. Example: "Example SalesOrderHeaderId"
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
     *             "sales_order_detail": {
     *                 "sales_order_detail_id": 1,
     *                 "sales_order_header_id": 1,
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
     * @return SalesOrderDetailResource
     */
    public function update(UpdateSalesOrderDetailRequest $request, SalesOrderDetail $salesOrderDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedSalesOrderDetail = $this->salesOrderDetailService->updateSalesOrderDetail($salesOrderDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Sales order detail updated successfully',
                'sales_order_detail' => new SalesOrderDetailResource($updatedSalesOrderDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating sales order detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update sales order detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SalesOrderDetail
     *
     * @method DELETE
     *
     * Delete a salesorderdetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the salesorderdetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesOrderDetail $salesOrderDetail)
    {
        //
    }
}
