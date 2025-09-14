<?php

namespace App\Http\Controllers;

use App\Models\BankDeposit;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\BankDepositService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBankDepositRequest;
use App\Http\Requests\UpdateBankDepositRequest;
use App\Http\Resources\BankDepositResource;

class BankDepositController extends Controller
{
    use ApiResponse;

    public function __construct(
        private BankDepositService $bankDepositService // Ensure this service exists
    ) {
    }

    /**
     * @group BankDeposit
     *
     * @method GET
     *
     * List all bankdeposit
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "bankDeposits": [
     *                 {
     *                     "bank_deposit_id": 1,
     *                     "date": "Example value",
     *                     "bank_account_id": 1,
     *                     "amount": "Example value",
     *                     "comments": "Example value",
     *                     "transaction_id": 1,
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "is_deleted": true,
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

            $bankDeposits = $this->bankDepositService->getBankDeposits($perPage);

            return $this->successResponse([
                'bankDeposits' => BankDepositResource::collection($bankDeposits['bankDeposits']),
                'pagination' => $bankDeposits['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching bank deposits: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group BankDeposit
     *
     * @method GET
     *
     * Create bankdeposit
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "deposit": {
     *                 "bank_deposit_id": 1,
     *                 "date": "Example value",
     *                 "bank_account_id": 1,
     *                 "amount": "Example value",
     *                 "comments": "Example value",
     *                 "transaction_id": 1,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankDepositResource
     */
    public function create()
    {
        //
    }

    /**
     * @group BankDeposit
     *
     * @method POST
     *
     * Create a new bankdeposit
     *
     * @post /
     *
     * @bodyParam DepositID string required. Maximum length: 255. Example: "Example DepositID"
     * @bodyParam BankAccountID string required. Maximum length: 255. Example: "Example BankAccountID"
     * @bodyParam Amount number required. numeric. Example: 1
     * @bodyParam DepositDate string required. date. Example: "Example DepositDate"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "deposit": {
     *                 "bank_deposit_id": 1,
     *                 "date": "Example value",
     *                 "bank_account_id": 1,
     *                 "amount": "Example value",
     *                 "comments": "Example value",
     *                 "transaction_id": 1,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankDepositResource
     */
    public function store(StoreBankDepositRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $deposit = $this->bankDepositService->createBankDeposit($validatedData);

            return $this->successResponse([
                'message' => 'Bank deposit created successfully',
                'deposit' => new BankDepositResource($deposit)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating bank deposit: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create bank deposit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group BankDeposit
     *
     * @method GET
     *
     * Get a specific bankdeposit
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the bankdeposit to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "deposit": {
     *                 "bank_deposit_id": 1,
     *                 "date": "Example value",
     *                 "bank_account_id": 1,
     *                 "amount": "Example value",
     *                 "comments": "Example value",
     *                 "transaction_id": 1,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankDepositResource
     */
    public function show(BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * @group BankDeposit
     *
     * @method GET
     *
     * Edit bankdeposit
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the bankdeposit to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "deposit": {
     *                 "bank_deposit_id": 1,
     *                 "date": "Example value",
     *                 "bank_account_id": 1,
     *                 "amount": "Example value",
     *                 "comments": "Example value",
     *                 "transaction_id": 1,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankDepositResource
     */
    public function edit(BankDeposit $bankDeposit)
    {
        //
    }

    /**
     * @group BankDeposit
     *
     * @method PUT
     *
     * Update an existing bankdeposit
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the bankdeposit to update. Example: 1
     *
     * @bodyParam DepositID string optional. Maximum length: 255. Example: "Example DepositID"
     * @bodyParam BankAccountID string optional. Maximum length: 255. Example: "Example BankAccountID"
     * @bodyParam Amount number optional. numeric. Example: 1
     * @bodyParam DepositDate string optional. date. Example: "Example DepositDate"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "deposit": {
     *                 "bank_deposit_id": 1,
     *                 "date": "Example value",
     *                 "bank_account_id": 1,
     *                 "amount": "Example value",
     *                 "comments": "Example value",
     *                 "transaction_id": 1,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "is_deleted": true,
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
     * @return BankDepositResource
     */
    public function update(UpdateBankDepositRequest $request, BankDeposit $bankDeposit)
    {
        try {
            $validatedData = $request->validated();

            $updatedDeposit = $this->bankDepositService->updateBankDeposit($bankDeposit, $validatedData);

            return $this->successResponse([
                'message' => 'Bank deposit updated successfully',
                'deposit' => new BankDepositResource($updatedDeposit)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating bank deposit: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update bank deposit',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group BankDeposit
     *
     * @method DELETE
     *
     * Delete a bankdeposit
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the bankdeposit to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankDeposit $bankDeposit)
    {
        //
    }
}
