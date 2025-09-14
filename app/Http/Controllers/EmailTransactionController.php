<?php

namespace App\Http\Controllers;

use App\Models\EmailTransaction;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EmailTransactionService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EmailTransactionResource;
use App\Http\Requests\StoreEmailTransactionRequest;
use App\Http\Requests\UpdateEmailTransactionRequest;
use App\Models\Patient;

class EmailTransactionController extends Controller
{
    use ApiResponse;

    public function __construct(private EmailTransactionService $transactionService)
    {
    }

    /**
     * @group EmailTransaction
     *
     * @method GET
     *
     * List all emailtransaction
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "email_transactions": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "email_type_id": "user@example.com",
     *                     "email_to": "user@example.com",
     *                     "email_from": "user@example.com",
     *                     "email_cc": "user@example.com",
     *                     "email_bcc": "user@example.com",
     *                     "subject": "Example value",
     *                     "message_text": "Example value",
     *                     "email_attachments_id": "user@example.com",
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "status": "Example value",
     *                     "sent_on": "Example value",
     *                     "is_deleted": true,
     *                     "email_from_name": "user@example.com",
     *                     "email_to_name": "user@example.com",
     *                     "scheduled_on": "Example value"
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
            $data = $this->transactionService->getEmailTransactions($perPage, $patient);

            return $this->successResponse([
                'email_transactions' => EmailTransactionResource::collection($data['transactions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Email Transactions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EmailTransaction
     *
     * @method GET
     *
     * Create emailtransaction
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "transaction": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "email_type_id": "user@example.com",
     *                 "email_to": "user@example.com",
     *                 "email_from": "user@example.com",
     *                 "email_cc": "user@example.com",
     *                 "email_bcc": "user@example.com",
     *                 "subject": "Example value",
     *                 "message_text": "Example value",
     *                 "email_attachments_id": "user@example.com",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "status": "Example value",
     *                 "sent_on": "Example value",
     *                 "is_deleted": true,
     *                 "email_from_name": "user@example.com",
     *                 "email_to_name": "user@example.com",
     *                 "scheduled_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTransactionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EmailTransaction
     *
     * @method POST
     *
     * Create a new emailtransaction
     *
     * @post /
     *
     * @bodyParam ClinicIID string required. Maximum length: 255. Example: "Example ClinicIID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam EmailTypeID string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailTypeID"
     * @bodyParam EmailTo string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailTo"
     * @bodyParam EmailFrom string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailFrom"
     * @bodyParam EmailCC string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailCC"
     * @bodyParam EmailBcc string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailBcc"
     * @bodyParam Subject string required. Example: "Example Subject"
     * @bodyParam MessageText string required. Example: "Example MessageText"
     * @bodyParam EmailAttachmentsID string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailAttachmentsID"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam Status string required. Example: "Example Status"
     * @bodyParam SentOn string required. Example: "Example SentOn"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam EmailFromName string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailFromName"
     * @bodyParam EmailToName string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailToName"
     * @bodyParam ScheduledOn string required. Example: "Example ScheduledOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "transaction": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "email_type_id": "user@example.com",
     *                 "email_to": "user@example.com",
     *                 "email_from": "user@example.com",
     *                 "email_cc": "user@example.com",
     *                 "email_bcc": "user@example.com",
     *                 "subject": "Example value",
     *                 "message_text": "Example value",
     *                 "email_attachments_id": "user@example.com",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "status": "Example value",
     *                 "sent_on": "Example value",
     *                 "is_deleted": true,
     *                 "email_from_name": "user@example.com",
     *                 "email_to_name": "user@example.com",
     *                 "scheduled_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTransactionResource
     */
    public function store(StoreEmailTransactionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $transaction = $this->transactionService->createTransaction($validatedData);

            return $this->successResponse([
                'message' => 'Email transaction created successfully',
                'transaction' => new EmailTransactionResource($transaction)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating email transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create email transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTransaction
     *
     * @method GET
     *
     * Get a specific emailtransaction
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the emailtransaction to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "transaction": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "email_type_id": "user@example.com",
     *                 "email_to": "user@example.com",
     *                 "email_from": "user@example.com",
     *                 "email_cc": "user@example.com",
     *                 "email_bcc": "user@example.com",
     *                 "subject": "Example value",
     *                 "message_text": "Example value",
     *                 "email_attachments_id": "user@example.com",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "status": "Example value",
     *                 "sent_on": "Example value",
     *                 "is_deleted": true,
     *                 "email_from_name": "user@example.com",
     *                 "email_to_name": "user@example.com",
     *                 "scheduled_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTransactionResource
     */
    public function show(EmailTransaction $emailTransaction)
    {
        //
    }

    /**
     * @group EmailTransaction
     *
     * @method GET
     *
     * Edit emailtransaction
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the emailtransaction to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "transaction": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "email_type_id": "user@example.com",
     *                 "email_to": "user@example.com",
     *                 "email_from": "user@example.com",
     *                 "email_cc": "user@example.com",
     *                 "email_bcc": "user@example.com",
     *                 "subject": "Example value",
     *                 "message_text": "Example value",
     *                 "email_attachments_id": "user@example.com",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "status": "Example value",
     *                 "sent_on": "Example value",
     *                 "is_deleted": true,
     *                 "email_from_name": "user@example.com",
     *                 "email_to_name": "user@example.com",
     *                 "scheduled_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTransactionResource
     */
    public function edit(EmailTransaction $emailTransaction)
    {
        //
    }

    /**
     * @group EmailTransaction
     *
     * @method PUT
     *
     * Update an existing emailtransaction
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the emailtransaction to update. Example: 1
     *
     * @bodyParam ClinicIID string optional. Maximum length: 255. Example: "Example ClinicIID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam EmailTypeID string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailTypeID"
     * @bodyParam EmailTo string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailTo"
     * @bodyParam EmailFrom string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailFrom"
     * @bodyParam EmailCC string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailCC"
     * @bodyParam EmailBcc string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailBcc"
     * @bodyParam Subject string optional. Example: "Example Subject"
     * @bodyParam MessageText string optional. Example: "Example MessageText"
     * @bodyParam EmailAttachmentsID string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailAttachmentsID"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam Status string optional. Example: "Example Status"
     * @bodyParam SentOn string optional. Example: "Example SentOn"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam EmailFromName string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailFromName"
     * @bodyParam EmailToName string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailToName"
     * @bodyParam ScheduledOn string optional. Example: "Example ScheduledOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "transaction": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "email_type_id": "user@example.com",
     *                 "email_to": "user@example.com",
     *                 "email_from": "user@example.com",
     *                 "email_cc": "user@example.com",
     *                 "email_bcc": "user@example.com",
     *                 "subject": "Example value",
     *                 "message_text": "Example value",
     *                 "email_attachments_id": "user@example.com",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "status": "Example value",
     *                 "sent_on": "Example value",
     *                 "is_deleted": true,
     *                 "email_from_name": "user@example.com",
     *                 "email_to_name": "user@example.com",
     *                 "scheduled_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTransactionResource
     */
    public function update(UpdateEmailTransactionRequest $request, EmailTransaction $emailTransaction)
    {
        try {
            $validatedData = $request->validated();

            $updatedTransaction = $this->transactionService->updateTransaction($emailTransaction, $validatedData);

            return $this->successResponse([
                'message' => 'Email transaction updated successfully',
                'transaction' => new EmailTransactionResource($updatedTransaction)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating email transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update email transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTransaction
     *
     * @method DELETE
     *
     * Delete a emailtransaction
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the emailtransaction to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTransaction $emailTransaction)
    {
        //
    }
}
