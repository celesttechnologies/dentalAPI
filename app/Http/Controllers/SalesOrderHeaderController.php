<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalesOrderHeaderResource; // Assuming you have a resource for Sales Order Header
use App\Models\SalesOrderHeader;
use App\Services\SalesOrderHeaderService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSalesOrderHeaderRequest;
use App\Http\Requests\UpdateSalesOrderHeaderRequest;

class SalesOrderHeaderController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private SalesOrderHeaderService $salesOrderHeaderService)
    {
    }

    /**
     * @group SalesOrderHeader
     *
     * @method GET
     *
     * List all salesorderheader
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_headers": [
     *                 {
     *                     "sales_order_header_id": 1,
     *                     "clinic_id": 1,
     *                     "sales_order_no": "Example value",
     *                     "sales_order_date": "Example value",
     *                     "item_customer_id": 1,
     *                     "invoice_no": "Example value",
     *                     "invoice_date": "Example value",
     *                     "narration": "Example value",
     *                     "despatch_date": "Example value",
     *                     "total": "Example value",
     *                     "tax": "Example value",
     *                     "other_expenses": "Example value",
     *                     "discount": "Example value",
     *                     "grand_total": "Example value",
     *                     "paid_amount": 1,
     *                     "balance_amount": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "less_amount": "Example value",
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
            $data = $this->salesOrderHeaderService->getSalesOrderHeaders($perPage);

            return $this->successResponse([
                'sales_order_headers' => SalesOrderHeaderResource::collection($data['sales_order_headers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Sales Order Headers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group SalesOrderHeader
     *
     * @method GET
     *
     * Create salesorderheader
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_header": {
     *                 "sales_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "sales_order_no": "Example value",
     *                 "sales_order_date": "Example value",
     *                 "item_customer_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "despatch_date": "Example value",
     *                 "total": "Example value",
     *                 "tax": "Example value",
     *                 "other_expenses": "Example value",
     *                 "discount": "Example value",
     *                 "grand_total": "Example value",
     *                 "paid_amount": 1,
     *                 "balance_amount": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "less_amount": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SalesOrderHeaderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SalesOrderHeader
     *
     * @method POST
     *
     * Create a new salesorderheader
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SalesOrderNo string required. Example: "Example SalesOrderNo"
     * @bodyParam SalesOrderDate string required. date. Example: "Example SalesOrderDate"
     * @bodyParam ItemCustomerID string required. Maximum length: 255. Example: "Example ItemCustomerID"
     * @bodyParam InvoiceNo string required. Example: "Example InvoiceNo"
     * @bodyParam InvoiceDate string required. date. Example: "Example InvoiceDate"
     * @bodyParam Naration string required. Example: "Example Naration"
     * @bodyParam DespatchDate string required. date. Example: "Example DespatchDate"
     * @bodyParam Total string required. Example: "Example Total"
     * @bodyParam Tax string required. Example: "Example Tax"
     * @bodyParam OtherExp string required. Example: "Example OtherExp"
     * @bodyParam Discount string required. Example: "Example Discount"
     * @bodyParam GrandTotal string required. Example: "Example GrandTotal"
     * @bodyParam PaidAmt string required. Maximum length: 255. Example: "1"
     * @bodyParam BalanceAmt string required. Example: "Example BalanceAmt"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreateBy string required. Example: "Example CreateBy"
     * @bodyParam CreateOn string required. Example: "Example CreateOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LessAmt string required. Example: "Example LessAmt"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_header": {
     *                 "sales_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "sales_order_no": "Example value",
     *                 "sales_order_date": "Example value",
     *                 "item_customer_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "despatch_date": "Example value",
     *                 "total": "Example value",
     *                 "tax": "Example value",
     *                 "other_expenses": "Example value",
     *                 "discount": "Example value",
     *                 "grand_total": "Example value",
     *                 "paid_amount": 1,
     *                 "balance_amount": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "less_amount": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SalesOrderHeaderResource
     */
    public function store(StoreSalesOrderHeaderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $salesOrderHeader = $this->salesOrderHeaderService->createSalesOrderHeader($validatedData);

            return $this->successResponse([
                'message' => 'Sales order header created successfully',
                'sales_order_header' => new SalesOrderHeaderResource($salesOrderHeader)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating sales order header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create sales order header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SalesOrderHeader
     *
     * @method GET
     *
     * Get a specific salesorderheader
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the salesorderheader to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_header": {
     *                 "sales_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "sales_order_no": "Example value",
     *                 "sales_order_date": "Example value",
     *                 "item_customer_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "despatch_date": "Example value",
     *                 "total": "Example value",
     *                 "tax": "Example value",
     *                 "other_expenses": "Example value",
     *                 "discount": "Example value",
     *                 "grand_total": "Example value",
     *                 "paid_amount": 1,
     *                 "balance_amount": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "less_amount": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SalesOrderHeaderResource
     */
    public function show(SalesOrderHeader $salesOrderHeader)
    {
        //
    }

    /**
     * @group SalesOrderHeader
     *
     * @method GET
     *
     * Edit salesorderheader
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the salesorderheader to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_header": {
     *                 "sales_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "sales_order_no": "Example value",
     *                 "sales_order_date": "Example value",
     *                 "item_customer_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "despatch_date": "Example value",
     *                 "total": "Example value",
     *                 "tax": "Example value",
     *                 "other_expenses": "Example value",
     *                 "discount": "Example value",
     *                 "grand_total": "Example value",
     *                 "paid_amount": 1,
     *                 "balance_amount": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "less_amount": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SalesOrderHeaderResource
     */
    public function edit(SalesOrderHeader $salesOrderHeader)
    {
        //
    }

    /**
     * @group SalesOrderHeader
     *
     * @method PUT
     *
     * Update an existing salesorderheader
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the salesorderheader to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SalesOrderNo string optional. Example: "Example SalesOrderNo"
     * @bodyParam SalesOrderDate string optional. date. Example: "Example SalesOrderDate"
     * @bodyParam ItemCustomerID string optional. Maximum length: 255. Example: "Example ItemCustomerID"
     * @bodyParam InvoiceNo string optional. Example: "Example InvoiceNo"
     * @bodyParam InvoiceDate string optional. date. Example: "Example InvoiceDate"
     * @bodyParam Naration string optional. Example: "Example Naration"
     * @bodyParam DespatchDate string optional. date. Example: "Example DespatchDate"
     * @bodyParam Total string optional. Example: "Example Total"
     * @bodyParam Tax string optional. Example: "Example Tax"
     * @bodyParam OtherExp string optional. Example: "Example OtherExp"
     * @bodyParam Discount string optional. Example: "Example Discount"
     * @bodyParam GrandTotal string optional. Example: "Example GrandTotal"
     * @bodyParam PaidAmt string optional. Maximum length: 255. Example: "1"
     * @bodyParam BalanceAmt string optional. Example: "Example BalanceAmt"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreateBy string optional. Example: "Example CreateBy"
     * @bodyParam CreateOn string optional. Example: "Example CreateOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LessAmt string optional. Example: "Example LessAmt"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sales_order_header": {
     *                 "sales_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "sales_order_no": "Example value",
     *                 "sales_order_date": "Example value",
     *                 "item_customer_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "despatch_date": "Example value",
     *                 "total": "Example value",
     *                 "tax": "Example value",
     *                 "other_expenses": "Example value",
     *                 "discount": "Example value",
     *                 "grand_total": "Example value",
     *                 "paid_amount": 1,
     *                 "balance_amount": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "less_amount": "Example value",
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
     * @return SalesOrderHeaderResource
     */
    public function update(UpdateSalesOrderHeaderRequest $request, SalesOrderHeader $salesOrderHeader)
    {
        try {
            $validatedData = $request->validated();

            $updatedSalesOrderHeader = $this->salesOrderHeaderService->updateSalesOrderHeader($salesOrderHeader, $validatedData);

            return $this->successResponse([
                'message' => 'Sales order header updated successfully',
                'sales_order_header' => new SalesOrderHeaderResource($updatedSalesOrderHeader)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating sales order header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update sales order header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SalesOrderHeader
     *
     * @method DELETE
     *
     * Delete a salesorderheader
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the salesorderheader to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesOrderHeader $salesOrderHeader)
    {
        //
    }
}
