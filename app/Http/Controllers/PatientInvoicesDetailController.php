<?php

namespace App\Http\Controllers;

use App\Models\PatientInvoicesDetail;
use App\Http\Resources\PatientInvoicesDetailResource; // Assuming you have a resource for Patient Invoice Details
use App\Services\PatientInvoicesDetailService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientInvoicesDetailRequest;
use App\Http\Requests\UpdatePatientInvoicesDetailRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup InvoicesDetail
 * @subgroupDescription PatientInvoicesDetailController handles the CRUD operations for patient invoices detail controller.
 */
class PatientInvoicesDetailController extends Controller
{
    use ApiResponse; // Ensure this line is present

    public function __construct(private PatientInvoicesDetailService $patientInvoicesDetailService)
    {
    }

    /**
     * @group PatientInvoicesDetail
     *
     * @method GET
     *
     * List all patientinvoicesdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "invoice_details": [
     *                 {
     *                     "id": 1,
     *                     "invoice_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "treatment_date": "Example value",
     *                     "treatment_summary": "Example value",
     *                     "treatment_cost": "Example value",
     *                     "treatment_addition": "Example value",
     *                     "treatment_discount": "Example value",
     *                     "treatment_tax": "Example value",
     *                     "treatment_total_cost": "Example value",
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
            $data = $this->patientInvoicesDetailService->getInvoiceDetails($patient, $perPage);

            return $this->successResponse([
                'invoice_details' => PatientInvoicesDetailResource::collection($data['invoice_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Invoice Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
             //   'error' => $e->getMessage(),
               // 'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientInvoicesDetail
     *
     * @method POST
     *
     * Create a new patientinvoicesdetail
     *
     * @post /
     *
     * @bodyParam InvoiceID string required. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientTreatmentDoneID string required. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentDate string required. date. Example: "Example TreatmentDate"
     * @bodyParam TreatmentSummary string required. Example: "Example TreatmentSummary"
     * @bodyParam TreatmentCost number required. numeric. Example: 1
     * @bodyParam TreatmentAddition string required. Example: "Example TreatmentAddition"
     * @bodyParam TreatmentDiscount string required. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTax string required. Example: "Example TreatmentTax"
     * @bodyParam TreatmentTotalCost number required. numeric. Example: 1
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "invoice_detail": {
     *                 "id": 1,
     *                 "invoice_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_date": "Example value",
     *                 "treatment_summary": "Example value",
     *                 "treatment_cost": "Example value",
     *                 "treatment_addition": "Example value",
     *                 "treatment_discount": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "treatment_total_cost": "Example value",
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
     * @return PatientInvoicesDetailResource
     */
    public function store(StorePatientInvoicesDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $invoiceDetail = $this->patientInvoicesDetailService->createInvoiceDetail($validatedData);

            return $this->successResponse([
                'message' => 'Invoice detail created successfully',
                'invoice_detail' => new PatientInvoicesDetailResource($invoiceDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating invoice detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create invoice detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientInvoicesDetail
     *
     * @method PUT
     *
     * Update an existing patientinvoicesdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientinvoicesdetail to update. Example: 1
     *
     * @bodyParam InvoiceID string optional. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentDate string optional. date. Example: "Example TreatmentDate"
     * @bodyParam TreatmentSummary string optional. Example: "Example TreatmentSummary"
     * @bodyParam TreatmentCost number optional. numeric. Example: 1
     * @bodyParam TreatmentAddition string optional. Example: "Example TreatmentAddition"
     * @bodyParam TreatmentDiscount string optional. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTax string optional. Example: "Example TreatmentTax"
     * @bodyParam TreatmentTotalCost number optional. numeric. Example: 1
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "invoice_detail": {
     *                 "id": 1,
     *                 "invoice_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_date": "Example value",
     *                 "treatment_summary": "Example value",
     *                 "treatment_cost": "Example value",
     *                 "treatment_addition": "Example value",
     *                 "treatment_discount": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "treatment_total_cost": "Example value",
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
     * @return PatientInvoicesDetailResource
     */
    public function update(UpdatePatientInvoicesDetailRequest $request, PatientInvoicesDetail $patientInvoicesDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedInvoiceDetail = $this->patientInvoicesDetailService->updateInvoiceDetail($patientInvoicesDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Invoice detail updated successfully',
                'invoice_detail' => new PatientInvoicesDetailResource($updatedInvoiceDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating invoice detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update invoice detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
