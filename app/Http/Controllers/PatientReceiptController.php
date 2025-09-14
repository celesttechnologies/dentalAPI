<?php

namespace App\Http\Controllers;

use App\Models\PatientReceipt;
use App\Http\Resources\PatientReceiptResource; // Assuming you have a resource for Patient Receipt
use App\Services\PatientReceiptService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientReceiptRequest; // Assuming you have a request for storing Patient Receipt
use App\Http\Requests\UpdatePatientReceiptRequest; // Assuming you have a request for updating Patient Receipt
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Receipts
 * @subgroupDescription PatientReceiptController handles the CRUD operations for patient receipts controller.
 */
class PatientReceiptController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientReceiptService $patientReceiptService)
    {
    }

    /**
     * @group PatientReceipt
     *
     * @method GET
     *
     * List all patientreceipt
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_receipts": [
     *                 {
     *                     "receipt_id": 1,
     *                     "clinic_id": 1,
     *                     "receipt_no": "Example value",
     *                     "receipt_number": "Example value",
     *                     "manual_receipt_no": "Example value",
     *                     "receipt_code_prefix": "Example value",
     *                     "invoice_id": 1,
     *                     "receipt_date": "Example value",
     *                     "patient_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "treatment_payment": "Example value",
     *                     "invoiced_amount": "Example value",
     *                     "balance_amount": "Example value",
     *                     "mode_of_payment": "Example value",
     *                     "cheque_no": "Example value",
     *                     "cheque_date": "Example value",
     *                     "bank_name": "Example Name",
     *                     "credit_card_bank_id": 1,
     *                     "credit_card_digit": "Example value",
     *                     "credit_card_owner": "Example value",
     *                     "credit_card_valid_from": 1,
     *                     "credit_card_valid_to": 1,
     *                     "payment_notes": "Example value",
     *                     "is_cancelled": true,
     *                     "cancellation_notes": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "rowguid": 1,
     *                     "waiting_area_id": 1,
     *                     "insurance_name": "Example Name",
     *                     "policy_number": "Example value",
     *                     "policy_notes": "Example value",
     *                     "receipt_notes": "Example value"
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
            $data = $this->patientReceiptService->getPatientReceipts($patient, $perPage, $filters);

            return $this->successResponse([
                'patient_receipts' => PatientReceiptResource::collection($data['patient_receipts']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Receipts: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientReceipt
     *
     * @method POST
     *
     * Create a new patientreceipt
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ReceiptNo string required. Example: "Example ReceiptNo"
     * @bodyParam ReceiptNumber string required. Example: "Example ReceiptNumber"
     * @bodyParam ManualReceiptNo string required. Example: "Example ManualReceiptNo"
     * @bodyParam ReceiptCodePrefix string required. Example: "Example ReceiptCodePrefix"
     * @bodyParam InvoiceID string required. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam ReceiptDate string required. date. Example: "Example ReceiptDate"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientTreatmentDoneId string required. Maximum length: 255. Example: "Example PatientTreatmentDoneId"
     * @bodyParam TreatmentPayment string required. Example: "Example TreatmentPayment"
     * @bodyParam InvoicedAmount number required. numeric. Example: 1
     * @bodyParam BalanceAmount number required. numeric. Example: 1
     * @bodyParam ModeofPayment string required. Example: "Example ModeofPayment"
     * @bodyParam ChequeNo string required. Example: "Example ChequeNo"
     * @bodyParam ChequeDate string required. date. Example: "Example ChequeDate"
     * @bodyParam BankName string required. Example: "Example BankName"
     * @bodyParam CreditCardBankID string required. Maximum length: 255. Example: "Example CreditCardBankID"
     * @bodyParam CreditCardDigit string required. Example: "Example CreditCardDigit"
     * @bodyParam CreditCardOwner string required. Example: "Example CreditCardOwner"
     * @bodyParam CreditCardValidFrom string required. Maximum length: 255. Example: "1"
     * @bodyParam CreditCardValidTo string required. Maximum length: 255. Example: "1"
     * @bodyParam PaymentNotes string required. Example: "Example PaymentNotes"
     * @bodyParam IsCancelled string required. Example: "Example IsCancelled"
     * @bodyParam CancellationNotes string required. Example: "Example CancellationNotes"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam WaitingAreaID string required. Maximum length: 255. Example: "Example WaitingAreaID"
     * @bodyParam InsuranceName string required. Example: "Example InsuranceName"
     * @bodyParam PolicyNumber string required. Example: "Example PolicyNumber"
     * @bodyParam PolicyNotes string required. Example: "Example PolicyNotes"
     * @bodyParam ReceiptNotes string required. Example: "Example ReceiptNotes"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "receipt": {
     *                 "receipt_id": 1,
     *                 "clinic_id": 1,
     *                 "receipt_no": "Example value",
     *                 "receipt_number": "Example value",
     *                 "manual_receipt_no": "Example value",
     *                 "receipt_code_prefix": "Example value",
     *                 "invoice_id": 1,
     *                 "receipt_date": "Example value",
     *                 "patient_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_payment": "Example value",
     *                 "invoiced_amount": "Example value",
     *                 "balance_amount": "Example value",
     *                 "mode_of_payment": "Example value",
     *                 "cheque_no": "Example value",
     *                 "cheque_date": "Example value",
     *                 "bank_name": "Example Name",
     *                 "credit_card_bank_id": 1,
     *                 "credit_card_digit": "Example value",
     *                 "credit_card_owner": "Example value",
     *                 "credit_card_valid_from": 1,
     *                 "credit_card_valid_to": 1,
     *                 "payment_notes": "Example value",
     *                 "is_cancelled": true,
     *                 "cancellation_notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "waiting_area_id": 1,
     *                 "insurance_name": "Example Name",
     *                 "policy_number": "Example value",
     *                 "policy_notes": "Example value",
     *                 "receipt_notes": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientReceiptResource
     */
    public function store(StorePatientReceiptRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $receipt = $this->patientReceiptService->createPatientReceipt($validatedData);

            return $this->successResponse([
                'message' => 'Receipt created successfully',
                'receipt' => new PatientReceiptResource($receipt)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating receipt: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create receipt',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientReceipt
     *
     * @method PUT
     *
     * Update an existing patientreceipt
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientreceipt to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ReceiptNo string optional. Example: "Example ReceiptNo"
     * @bodyParam ReceiptNumber string optional. Example: "Example ReceiptNumber"
     * @bodyParam ManualReceiptNo string optional. Example: "Example ManualReceiptNo"
     * @bodyParam ReceiptCodePrefix string optional. Example: "Example ReceiptCodePrefix"
     * @bodyParam InvoiceID string optional. Maximum length: 255. Example: "Example InvoiceID"
     * @bodyParam ReceiptDate string optional. date. Example: "Example ReceiptDate"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientTreatmentDoneId string optional. Maximum length: 255. Example: "Example PatientTreatmentDoneId"
     * @bodyParam TreatmentPayment string optional. Example: "Example TreatmentPayment"
     * @bodyParam InvoicedAmount number optional. numeric. Example: 1
     * @bodyParam BalanceAmount number optional. numeric. Example: 1
     * @bodyParam ModeofPayment string optional. Example: "Example ModeofPayment"
     * @bodyParam ChequeNo string optional. Example: "Example ChequeNo"
     * @bodyParam ChequeDate string optional. date. Example: "Example ChequeDate"
     * @bodyParam BankName string optional. Example: "Example BankName"
     * @bodyParam CreditCardBankID string optional. Maximum length: 255. Example: "Example CreditCardBankID"
     * @bodyParam CreditCardDigit string optional. Example: "Example CreditCardDigit"
     * @bodyParam CreditCardOwner string optional. Example: "Example CreditCardOwner"
     * @bodyParam CreditCardValidFrom string optional. Maximum length: 255. Example: "1"
     * @bodyParam CreditCardValidTo string optional. Maximum length: 255. Example: "1"
     * @bodyParam PaymentNotes string optional. Example: "Example PaymentNotes"
     * @bodyParam IsCancelled string optional. Example: "Example IsCancelled"
     * @bodyParam CancellationNotes string optional. Example: "Example CancellationNotes"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam WaitingAreaID string optional. Maximum length: 255. Example: "Example WaitingAreaID"
     * @bodyParam InsuranceName string optional. Example: "Example InsuranceName"
     * @bodyParam PolicyNumber string optional. Example: "Example PolicyNumber"
     * @bodyParam PolicyNotes string optional. Example: "Example PolicyNotes"
     * @bodyParam ReceiptNotes string optional. Example: "Example ReceiptNotes"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "receipt": {
     *                 "receipt_id": 1,
     *                 "clinic_id": 1,
     *                 "receipt_no": "Example value",
     *                 "receipt_number": "Example value",
     *                 "manual_receipt_no": "Example value",
     *                 "receipt_code_prefix": "Example value",
     *                 "invoice_id": 1,
     *                 "receipt_date": "Example value",
     *                 "patient_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_payment": "Example value",
     *                 "invoiced_amount": "Example value",
     *                 "balance_amount": "Example value",
     *                 "mode_of_payment": "Example value",
     *                 "cheque_no": "Example value",
     *                 "cheque_date": "Example value",
     *                 "bank_name": "Example Name",
     *                 "credit_card_bank_id": 1,
     *                 "credit_card_digit": "Example value",
     *                 "credit_card_owner": "Example value",
     *                 "credit_card_valid_from": 1,
     *                 "credit_card_valid_to": 1,
     *                 "payment_notes": "Example value",
     *                 "is_cancelled": true,
     *                 "cancellation_notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "waiting_area_id": 1,
     *                 "insurance_name": "Example Name",
     *                 "policy_number": "Example value",
     *                 "policy_notes": "Example value",
     *                 "receipt_notes": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientReceiptResource
     */
    public function update(UpdatePatientReceiptRequest $request, PatientReceipt $patientReceipt)
    {
        try {
            $validatedData = $request->validated();

            $updatedReceipt = $this->patientReceiptService->updatePatientReceipt($patientReceipt, $validatedData);

            return $this->successResponse([
                'message' => 'Receipt updated successfully',
                'receipt' => new PatientReceiptResource($updatedReceipt)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating receipt: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update receipt',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
