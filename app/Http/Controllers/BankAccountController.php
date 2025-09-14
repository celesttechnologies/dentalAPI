<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\BankAccountService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use App\Http\Resources\BankAccountResource;

class BankAccountController extends Controller
{
    use ApiResponse;

    public function __construct(
        private BankAccountService $bankAccountService // Ensure this service exists
    ) {
    }

    /**
     * @group BankAccount
     *
     * @method GET
     *
     * List all bankaccount
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "bankAccounts": [
     *                 {
     *                     "bank_account_id": 1,
     *                     "clinic_id": 1,
     *                     "bank_account_name": "Example Name",
     *                     "account_number": "Example value",
     *                     "branch": "Example value",
     *                     "city": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
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

            $bankAccounts = $this->bankAccountService->getBankAccounts($perPage);

            return $this->successResponse([
                'bankAccounts' => BankAccountResource::collection($bankAccounts['bankAccounts']),
                'pagination' => $bankAccounts['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching bank accounts: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group BankAccount
     *
     * @method GET
     *
     * Create bankaccount
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "account": {
     *                 "bank_account_id": 1,
     *                 "clinic_id": 1,
     *                 "bank_account_name": "Example Name",
     *                 "account_number": "Example value",
     *                 "branch": "Example value",
     *                 "city": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankAccountResource
     */
    public function create()
    {
        //
    }

    /**
     * @group BankAccount
     *
     * @method POST
     *
     * Create a new bankaccount
     *
     * @post /
     *
     * @bodyParam BankAccountID string required. Maximum length: 255. Example: "Example BankAccountID"
     * @bodyParam ClientID string required. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam AccountNumber string required. Maximum length: 100. Example: "Example AccountNumber"
     * @bodyParam BankName string required. Maximum length: 255. Example: "Example BankName"
     * @bodyParam OpeningBalance number required. numeric. Example: 1
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "account": {
     *                 "bank_account_id": 1,
     *                 "clinic_id": 1,
     *                 "bank_account_name": "Example Name",
     *                 "account_number": "Example value",
     *                 "branch": "Example value",
     *                 "city": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankAccountResource
     */
    public function store(StoreBankAccountRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $account = $this->bankAccountService->createBankAccount($validatedData);

            return $this->successResponse([
                'message' => 'Bank account created successfully',
                'account' => new BankAccountResource($account)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating bank account: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create bank account',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group BankAccount
     *
     * @method GET
     *
     * Get a specific bankaccount
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the bankaccount to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "account": {
     *                 "bank_account_id": 1,
     *                 "clinic_id": 1,
     *                 "bank_account_name": "Example Name",
     *                 "account_number": "Example value",
     *                 "branch": "Example value",
     *                 "city": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankAccountResource
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * @group BankAccount
     *
     * @method GET
     *
     * Edit bankaccount
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the bankaccount to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "account": {
     *                 "bank_account_id": 1,
     *                 "clinic_id": 1,
     *                 "bank_account_name": "Example Name",
     *                 "account_number": "Example value",
     *                 "branch": "Example value",
     *                 "city": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return BankAccountResource
     */
    public function edit(BankAccount $bankAccount)
    {
        //
    }

    /**
     * @group BankAccount
     *
     * @method PUT
     *
     * Update an existing bankaccount
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the bankaccount to update. Example: 1
     *
     * @bodyParam BankAccountID string optional. Maximum length: 255. Example: "Example BankAccountID"
     * @bodyParam ClientID string optional. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam AccountNumber string optional. Maximum length: 100. Example: "Example AccountNumber"
     * @bodyParam BankName string optional. Maximum length: 255. Example: "Example BankName"
     * @bodyParam OpeningBalance number optional. numeric. Example: 1
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "account": {
     *                 "bank_account_id": 1,
     *                 "clinic_id": 1,
     *                 "bank_account_name": "Example Name",
     *                 "account_number": "Example value",
     *                 "branch": "Example value",
     *                 "city": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
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
     * @return BankAccountResource
     */
    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        try {
            $validatedData = $request->validated();

            $updatedAccount = $this->bankAccountService->updateBankAccount($bankAccount, $validatedData);

            return $this->successResponse([
                'message' => 'Bank account updated successfully',
                'account' => new BankAccountResource($updatedAccount)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating bank account: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update bank account',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group BankAccount
     *
     * @method DELETE
     *
     * Delete a bankaccount
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the bankaccount to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
