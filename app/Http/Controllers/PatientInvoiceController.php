<?php

namespace App\Http\Controllers;

use App\Models\PatientInvoice;
use App\Http\Resources\PatientInvoiceResource; // Assuming you have a resource for Patient Invoice
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\PatientInvoiceService;
use App\Http\Requests\StorePatientInvoiceRequest;
use App\Http\Requests\UpdatePatientInvoiceRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Invoices
 * @subgroupDescription PatientInvoicesController handles the CRUD operations for patient invoices controller.
 */
class PatientInvoiceController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientInvoiceService $patientInvoiceService)
    {
    }

    /**
     * @group PatientInvoice
     *
     * @method GET
     *
     * List all patientinvoice
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "invoices": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "invoice_no": "Example value",
     *                     "invoice_number": "Example value",
     *                     "manual_invoice_no": "Example value",
     *                     "invoice_code_prefix": "Example value",
     *                     "invoice_date": "Example value",
     *                     "patient_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "treatment_cost": "Example value",
     *                     "treatment_addition": "Example value",
     *                     "treatment_discount": "Example value",
     *                     "treatment_tax": "Example value",
     *                     "treatment_total_cost": "Example value",
     *                     "treatment_total_payment": "Example value",
     *                     "treatment_balance": "Example value",
     *                     "is_deleted": true,
     *                     "is_cancelled": true,
     *                     "cancellation_notes": "Example value",
     *                     "status": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "notes": "Example value",
     *                     "rowguid": 1
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
    public function index(Request $request, $patient = null)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $filters = $request->only(['start_date', 'end_date']);
            $data = $this->patientInvoiceService->getInvoices($patient, $perPage, $filters);

            return $this->successResponse([
                'invoices' => PatientInvoiceResource::collection($data['invoices']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Invoices: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientInvoice
     *
     * @method POST
     *
     * Create a new patientinvoice
     *
     * @post /
     *
     * @bodyParam InvoiceID string required. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam Amount number required. numeric. Example: 1
     * @bodyParam IssuedOn string required. date. Example: "Example IssuedOn"
     * @bodyParam DueDate string optional. nullable. date. Example: "Example DueDate"
     * @bodyParam Status string optional. nullable. Maximum length: 100. Example: "Example Status"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "invoice": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_number": "Example value",
     *                 "manual_invoice_no": "Example value",
     *                 "invoice_code_prefix": "Example value",
     *                 "invoice_date": "Example value",
     *                 "patient_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_cost": "Example value",
     *                 "treatment_addition": "Example value",
     *                 "treatment_discount": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "treatment_total_cost": "Example value",
     *                 "treatment_total_payment": "Example value",
     *                 "treatment_balance": "Example value",
     *                 "is_deleted": true,
     *                 "is_cancelled": true,
     *                 "cancellation_notes": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "notes": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientInvoiceResource
     */
    public function store(StorePatientInvoiceRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $invoice = $this->patientInvoiceService->createInvoice($validatedData);

            return $this->successResponse([
                'message' => 'Invoice created successfully',
                'invoice' => new PatientInvoiceResource($invoice)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating invoice: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create invoice',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientInvoice
     *
     * @method PUT
     *
     * Update an existing patientinvoice
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientinvoice to update. Example: 1
     *
     * @bodyParam InvoiceID string optional. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam Amount number optional. numeric. Example: 1
     * @bodyParam IssuedOn string optional. date. Example: "Example IssuedOn"
     * @bodyParam DueDate string optional. nullable. date. Example: "Example DueDate"
     * @bodyParam Status string optional. nullable. Maximum length: 100. Example: "Example Status"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "invoice": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "invoice_no": "Example value",
     *                 "invoice_number": "Example value",
     *                 "manual_invoice_no": "Example value",
     *                 "invoice_code_prefix": "Example value",
     *                 "invoice_date": "Example value",
     *                 "patient_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_cost": "Example value",
     *                 "treatment_addition": "Example value",
     *                 "treatment_discount": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "treatment_total_cost": "Example value",
     *                 "treatment_total_payment": "Example value",
     *                 "treatment_balance": "Example value",
     *                 "is_deleted": true,
     *                 "is_cancelled": true,
     *                 "cancellation_notes": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "notes": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientInvoiceResource
     */
    public function update(UpdatePatientInvoiceRequest $request, PatientInvoice $patientInvoice)
    {
        try {
            $validatedData = $request->validated();

            $updatedInvoice = $this->patientInvoiceService->updateInvoice($patientInvoice, $validatedData);

            return $this->successResponse([
                'message' => 'Invoice updated successfully',
                'invoice' => new PatientInvoiceResource($updatedInvoice)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating invoice: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update invoice',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
