<?php

namespace App\Http\Controllers;

use App\Http\Resources\SMSTransactionResource;
use App\Models\SMSTransaction;
use App\Services\SMSTransactionService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSMSTransactionRequest;
use App\Http\Requests\UpdateSMSTransactionRequest;
use App\Models\Patient;

class SMSTransactionController extends Controller
{
    use ApiResponse;

    public function __construct(private SMSTransactionService $smsTransactionService)
    {
    }

    /**
     * @group SMSTransaction
     *
     * @method GET
     *
     * List all smstransaction
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transactions": [
     *                 []
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
            $data = $this->smsTransactionService->getSMSTransactions($perPage, $patient);

            return $this->successResponse([
                'sms_transactions' => SMSTransactionResource::collection($data['sms_transactions']),
                'pagination' => $data['pagination'],
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching SMS Transactions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group SMSTransaction
     *
     * @method GET
     *
     * Create smstransaction
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transaction": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTransactionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SMSTransaction
     *
     * @method POST
     *
     * Create a new smstransaction
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ReferenceCode string required. Example: "Example ReferenceCode"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam SMSTypeID string required. Maximum length: 255. Example: "Example SMSTypeID"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam MessageText string required. Example: "Example MessageText"
     * @bodyParam ScheduledOn string required. Example: "Example ScheduledOn"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam SentStatus string required. Example: "Example SentStatus"
     * @bodyParam SentOn string required. Example: "Example SentOn"
     * @bodyParam SentStatusMessage string required. Example: "Example SentStatusMessage"
     * @bodyParam IsPromotional string required. Example: "Example IsPromotional"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transaction": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTransactionResource
     */
    public function store(StoreSMSTransactionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $smsTransaction = $this->smsTransactionService->createSMSTransaction($validatedData);

            return $this->successResponse([
                'message' => 'SMS transaction created successfully',
                'sms_transaction' => new SMSTransactionResource($smsTransaction)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating SMS transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create SMS transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSTransaction
     *
     * @method GET
     *
     * Get a specific smstransaction
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the smstransaction to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transaction": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTransactionResource
     */
    public function show(SMSTransaction $sMSTransaction)
    {
        //
    }

    /**
     * @group SMSTransaction
     *
     * @method GET
     *
     * Edit smstransaction
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the smstransaction to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transaction": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTransactionResource
     */
    public function edit(SMSTransaction $sMSTransaction)
    {
        //
    }

    /**
     * @group SMSTransaction
     *
     * @method PUT
     *
     * Update an existing smstransaction
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the smstransaction to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ReferenceCode string optional. Example: "Example ReferenceCode"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam SMSTypeID string optional. Maximum length: 255. Example: "Example SMSTypeID"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam MessageText string optional. Example: "Example MessageText"
     * @bodyParam ScheduledOn string optional. Example: "Example ScheduledOn"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam SentStatus string optional. Example: "Example SentStatus"
     * @bodyParam SentOn string optional. Example: "Example SentOn"
     * @bodyParam SentStatusMessage string optional. Example: "Example SentStatusMessage"
     * @bodyParam IsPromotional string optional. Example: "Example IsPromotional"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_transaction": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTransactionResource
     */
    public function update(UpdateSMSTransactionRequest $request, SMSTransaction $sMSTransaction)
    {
        try {
            $validatedData = $request->validated();

            $updatedTransaction = $this->smsTransactionService->updateSMSTransaction($sMSTransaction, $validatedData);

            return $this->successResponse([
                'message' => 'SMS transaction updated successfully',
                'sms_transaction' => new SMSTransactionResource($updatedTransaction)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating SMS transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update SMS transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSTransaction
     *
     * @method DELETE
     *
     * Delete a smstransaction
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the smstransaction to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMSTransaction $sMSTransaction)
    {
        //
    }
}
