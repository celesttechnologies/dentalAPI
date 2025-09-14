<?php

namespace App\Http\Controllers;

use App\Services\WhatsappSMSTransactionService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use App\Models\WhatsappSMSTransaction;
use App\Http\Requests\StoreWhatsappSMSTransactionRequest;
use App\Http\Requests\UpdateWhatsappSMSTransactionRequest;
use App\Http\Resources\WhatsappSMSTransactionResource;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;

class WhatsappSMSTransactionController extends Controller
{
    use ApiResponse;

    public function __construct(
        private WhatsappSMSTransactionService $whatsappSMSTransactionService
    ) {
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method GET
     *
     * List all whatsappsmstransaction
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "transactions": [
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

            $transactions = $this->whatsappSMSTransactionService->getWhatsappSMSTransactions($perPage, $patient);

            return $this->successResponse([
                'transactions' => WhatsappSMSTransactionResource::collection($transactions['data']),
                'pagination' => $transactions['pagination']
            ]);
        } catch (Exception $e) {

            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method GET
     *
     * Create whatsappsmstransaction
     *
     * @get /create
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method POST
     *
     * Create a new whatsappsmstransaction
     *
     * @post /
     *
     * @bodyParam WhatsappSMSTransactionID string required. Maximum length: 255. Example: "Example WhatsappSMSTransactionID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam MessageText string required. Example: "Example MessageText"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam SentStatus string required. Example: "Example SentStatus"
     * @bodyParam SentOn string required. Example: "Example SentOn"
     * @bodyParam SentStatusMessage string required. Example: "Example SentStatusMessage"
     * @bodyParam SMSSituation string required. Example: "Example SMSSituation"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhatsappSMSTransactionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $transaction = $this->whatsappSMSTransactionService->createTransaction($validatedData);

            return $this->successResponse([
                'message' => 'WhatsApp SMS transaction created successfully',
                'transaction' => $transaction
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating WhatsApp SMS transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create WhatsApp SMS transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method GET
     *
     * Get a specific whatsappsmstransaction
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the whatsappsmstransaction to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsappSMSTransaction $whatsappSMSTransaction)
    {
        //
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method GET
     *
     * Edit whatsappsmstransaction
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the whatsappsmstransaction to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatsappSMSTransaction $whatsappSMSTransaction)
    {
        //
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method PUT
     *
     * Update an existing whatsappsmstransaction
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the whatsappsmstransaction to update. Example: 1
     *
     * @bodyParam WhatsappSMSTransactionID string optional. Maximum length: 255. Example: "Example WhatsappSMSTransactionID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam MessageText string optional. Example: "Example MessageText"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam SentStatus string optional. Example: "Example SentStatus"
     * @bodyParam SentOn string optional. Example: "Example SentOn"
     * @bodyParam SentStatusMessage string optional. Example: "Example SentStatusMessage"
     * @bodyParam SMSSituation string optional. Example: "Example SMSSituation"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhatsappSMSTransactionRequest $request, WhatsappSMSTransaction $whatsappSMSTransaction)
    {
        try {
            $validatedData = $request->validated();

            $updatedTransaction = $this->whatsappSMSTransactionService->updateTransaction($whatsappSMSTransaction, $validatedData);

            return $this->successResponse([
                'message' => 'WhatsApp SMS transaction updated successfully',
                'transaction' => $updatedTransaction
            ]);
        } catch (Exception $e) {
            Log::error('Error updating WhatsApp SMS transaction: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update WhatsApp SMS transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group WhatsappSMSTransaction
     *
     * @method DELETE
     *
     * Delete a whatsappsmstransaction
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the whatsappsmstransaction to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsappSMSTransaction $whatsappSMSTransaction)
    {
        //
    }
}
