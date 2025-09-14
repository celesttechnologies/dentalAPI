<?php

namespace App\Http\Controllers;

use App\Models\PatientReceiptsDetail;
use App\Http\Resources\PatientReceiptsDetailResource; // Assuming you have a resource for Patient Receipts Detail
use App\Services\PatientReceiptsDetailService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientReceiptsDetailRequest; // Assuming you have a request for storing receipt details
use App\Http\Requests\UpdatePatientReceiptsDetailRequest; // Assuming you have a request for updating receipt details
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup ReceiptsDetails
 * @subgroupDescription PatientReceiptsDetailController handles the CRUD operations for patient receipts detail controller.
 */
class PatientReceiptsDetailController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientReceiptsDetailService $patientReceiptsDetailService)
    {
    }

    /**
     * @group PatientReceiptsDetail
     *
     * @method GET
     *
     * List all patientreceiptsdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_receipts_details": [
     *                 {
     *                     "receipt_detail_id": 1,
     *                     "receipt_id": 1,
     *                     "invoice_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "amount_paid": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientReceiptsDetailService->getPatientReceiptsDetails($patient, $perPage);

            return $this->successResponse([
                'patient_receipts_details' => PatientReceiptsDetailResource::collection($data['patient_receipts_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Receipts Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientReceiptsDetail
     *
     * @method POST
     *
     * Create a new patientreceiptsdetail
     *
     * @post /
     *
     * @bodyParam ReceiptID string required. Maximum length: 255. Example: "Example ReceiptID"
     * @bodyParam InvoiceID string required. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientTreatmentDoneID string required. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam AmountPaid number required. numeric. Example: 1
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "receipt_detail": {
     *                 "receipt_detail_id": 1,
     *                 "receipt_id": 1,
     *                 "invoice_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "amount_paid": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientReceiptsDetailResource
     */
    public function store(StorePatientReceiptsDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $receiptDetail = $this->patientReceiptsDetailService->createReceiptDetail($validatedData);

            return $this->successResponse([
                'message' => 'Receipt detail created successfully',
                'receipt_detail' => new PatientReceiptsDetailResource($receiptDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating receipt detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create receipt detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientReceiptsDetail
     *
     * @method PUT
     *
     * Update an existing patientreceiptsdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientreceiptsdetail to update. Example: 1
     *
     * @bodyParam ReceiptID string optional. Maximum length: 255. Example: "Example ReceiptID"
     * @bodyParam InvoiceID string optional. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam AmountPaid number optional. numeric. Example: 1
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "receipt_detail": {
     *                 "receipt_detail_id": 1,
     *                 "receipt_id": 1,
     *                 "invoice_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "amount_paid": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientReceiptsDetailResource
     */
    public function update(UpdatePatientReceiptsDetailRequest $request, PatientReceiptsDetail $patientReceiptsDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedReceiptDetail = $this->patientReceiptsDetailService->updateReceiptDetail($patientReceiptsDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Receipt detail updated successfully',
                'receipt_detail' => new PatientReceiptsDetailResource($updatedReceiptDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating receipt detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update receipt detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
