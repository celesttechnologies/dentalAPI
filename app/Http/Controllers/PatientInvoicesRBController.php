<?php

namespace App\Http\Controllers;

use App\Models\PatientInvoicesRB;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientInvoicesRBService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientInvoicesRBResource;
use App\Http\Requests\StorePatientInvoicesRBRequest;
use App\Http\Requests\UpdatePatientInvoicesRBRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup InvoicesRB
 * @subgroupDescription PatientInvoicesRBController handles the CRUD operations for patient invoices rb controller.
 */
class PatientInvoicesRBController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientInvoicesRBService $invoiceService)
    {
    }

    /**
     * @group PatientInvoicesRB
     *
     * @method GET
     *
     * List all patientinvoicesrb
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "invoices": [
     *                 {
     *                     "invoice_detail_id": 1,
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
            $data = $this->invoiceService->getInvoices($patient, $perPage);

            return $this->successResponse([
                'invoices' => PatientInvoicesRBResource::collection($data['invoices']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Invoices RB: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientInvoicesRB
     *
     * @method POST
     *
     * Create a new patientinvoicesrb
     *
     * @post /
     *
     * @bodyParam InvoiceDetailID string required. Maximum length: 255. Example: "Example InvoiceDetailID"
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
     *             "invoice": {
     *                 "invoice_detail_id": 1,
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
     * @return PatientInvoicesRBResource
     */
    public function store(StorePatientInvoicesRBRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $invoice = $this->invoiceService->createInvoice($validatedData);

            return $this->successResponse([
                'message' => 'Patient invoice created successfully',
                'invoice' => new PatientInvoicesRBResource($invoice)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient invoice: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient invoice',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientInvoicesRB
     *
     * @method PUT
     *
     * Update an existing patientinvoicesrb
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientinvoicesrb to update. Example: 1
     *
     * @bodyParam InvoiceDetailID string optional. Maximum length: 255. Example: "Example InvoiceDetailID"
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
     *             "invoice": {
     *                 "invoice_detail_id": 1,
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
     * @return PatientInvoicesRBResource
     */
    public function update(UpdatePatientInvoicesRBRequest $request, PatientInvoicesRB $patientInvoicesRB)
    {
        try {
            $validatedData = $request->validated();

            $updatedInvoice = $this->invoiceService->updateInvoice($patientInvoicesRB, $validatedData);

            return $this->successResponse([
                'message' => 'Patient invoice updated successfully',
                'invoice' => new PatientInvoicesRBResource($updatedInvoice)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient invoice: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient invoice',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
