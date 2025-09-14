<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseOrderHeaderResource; // Assuming you have a resource for Purchase Order Header
use App\Models\PurchaseOrderHeader;
use App\Services\PurchaseOrderHeaderService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePurchaseOrderHeaderRequest;
use App\Http\Requests\UpdatePurchaseOrderHeaderRequest;

class PurchaseOrderHeaderController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PurchaseOrderHeaderService $purchaseOrderHeaderService)
    {
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method GET
     *
     * List all purchaseorderheader
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "purchase_order_headers": [
     *                 {
     *                     "purchase_order_header_id": 1,
     *                     "clinic_id": 1,
     *                     "purchase_order_no": "Example value",
     *                     "purchase_order_date": "Example value",
     *                     "item_supplier_id": 1,
     *                     "invoice_no": "Example value",
     *                     "invoice_date": "Example value",
     *                     "narration": "Example value",
     *                     "arrival_date": "Example value",
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
            $data = $this->purchaseOrderHeaderService->getPurchaseOrderHeaders($perPage);

            return $this->successResponse([
                'purchase_order_headers' => PurchaseOrderHeaderResource::collection($data['purchase_order_headers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Purchase Order Headers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method GET
     *
     * Create purchaseorderheader
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "purchase_order_header": {
     *                 "purchase_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "purchase_order_no": "Example value",
     *                 "purchase_order_date": "Example value",
     *                 "item_supplier_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "arrival_date": "Example value",
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
     * @return PurchaseOrderHeaderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method POST
     *
     * Create a new purchaseorderheader
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PurchaseOrderNo string required. Example: "Example PurchaseOrderNo"
     * @bodyParam PurchaseOrderDate string required. date. Example: "Example PurchaseOrderDate"
     * @bodyParam ItemSupplierID string required. Maximum length: 255. Example: "Example ItemSupplierID"
     * @bodyParam InvoiceNo string required. Example: "Example InvoiceNo"
     * @bodyParam InvoiceDate string required. date. Example: "Example InvoiceDate"
     * @bodyParam Naration string required. Example: "Example Naration"
     * @bodyParam ArrivalDate string required. date. Example: "Example ArrivalDate"
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
     *             "purchase_order_header": {
     *                 "purchase_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "purchase_order_no": "Example value",
     *                 "purchase_order_date": "Example value",
     *                 "item_supplier_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "arrival_date": "Example value",
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
     * @return PurchaseOrderHeaderResource
     */
    public function store(StorePurchaseOrderHeaderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $purchaseOrderHeader = $this->purchaseOrderHeaderService->createPurchaseOrderHeader($validatedData);

            return $this->successResponse([
                'message' => 'Purchase order header created successfully',
                'purchase_order_header' => new PurchaseOrderHeaderResource($purchaseOrderHeader)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating purchase order header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create purchase order header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method GET
     *
     * Get a specific purchaseorderheader
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderheader to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "purchase_order_header": {
     *                 "purchase_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "purchase_order_no": "Example value",
     *                 "purchase_order_date": "Example value",
     *                 "item_supplier_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "arrival_date": "Example value",
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
     * @return PurchaseOrderHeaderResource
     */
    public function show(PurchaseOrderHeader $purchaseOrderHeader)
    {
        //
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method GET
     *
     * Edit purchaseorderheader
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the purchaseorderheader to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "purchase_order_header": {
     *                 "purchase_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "purchase_order_no": "Example value",
     *                 "purchase_order_date": "Example value",
     *                 "item_supplier_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "arrival_date": "Example value",
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
     * @return PurchaseOrderHeaderResource
     */
    public function edit(PurchaseOrderHeader $purchaseOrderHeader)
    {
        //
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method PUT
     *
     * Update an existing purchaseorderheader
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderheader to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PurchaseOrderNo string optional. Example: "Example PurchaseOrderNo"
     * @bodyParam PurchaseOrderDate string optional. date. Example: "Example PurchaseOrderDate"
     * @bodyParam ItemSupplierID string optional. Maximum length: 255. Example: "Example ItemSupplierID"
     * @bodyParam InvoiceNo string optional. Example: "Example InvoiceNo"
     * @bodyParam InvoiceDate string optional. date. Example: "Example InvoiceDate"
     * @bodyParam Naration string optional. Example: "Example Naration"
     * @bodyParam ArrivalDate string optional. date. Example: "Example ArrivalDate"
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
     *             "purchase_order_header": {
     *                 "purchase_order_header_id": 1,
     *                 "clinic_id": 1,
     *                 "purchase_order_no": "Example value",
     *                 "purchase_order_date": "Example value",
     *                 "item_supplier_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_date": "Example value",
     *                 "narration": "Example value",
     *                 "arrival_date": "Example value",
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
     * @return PurchaseOrderHeaderResource
     */
    public function update(UpdatePurchaseOrderHeaderRequest $request, PurchaseOrderHeader $purchaseOrderHeader)
    {
        try {
            $validatedData = $request->validated();

            $updatedHeader = $this->purchaseOrderHeaderService->updatePurchaseOrderHeader($purchaseOrderHeader, $validatedData);

            return $this->successResponse([
                'message' => 'Purchase order header updated successfully',
                'purchase_order_header' => new PurchaseOrderHeaderResource($updatedHeader)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating purchase order header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update purchase order header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PurchaseOrderHeader
     *
     * @method DELETE
     *
     * Delete a purchaseorderheader
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the purchaseorderheader to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderHeader $purchaseOrderHeader)
    {
        //
    }
}
