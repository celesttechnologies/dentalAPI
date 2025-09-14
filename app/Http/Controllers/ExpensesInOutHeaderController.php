<?php

namespace App\Http\Controllers;

use App\Models\ExpensesInOutHeader;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ExpensesInOutHeaderService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ExpensesInOutHeaderResource;
use App\Http\Requests\StoreExpensesInOutHeaderRequest;
use App\Http\Requests\UpdateExpensesInOutHeaderRequest;

class ExpensesInOutHeaderController extends Controller
{
    use ApiResponse;

    public function __construct(private ExpensesInOutHeaderService $expensesService)
    {
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method GET
     *
     * List all expensesinoutheader
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expenses_in_out_headers": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "expense_category": "Example value",
     *                     "number_of_expense_items": "Example value",
     *                     "total_amount": "Example value",
     *                     "expense_date": "Example value",
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "comments": "Example value",
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
            $data = $this->expensesService->getExpensesInOutHeaders($perPage);

            return $this->successResponse([
                'expenses_in_out_headers' => ExpensesInOutHeaderResource::collection($data['headers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Expenses In Out Headers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method GET
     *
     * Create expensesinoutheader
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "expense_category": "Example value",
     *                 "number_of_expense_items": "Example value",
     *                 "total_amount": "Example value",
     *                 "expense_date": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "comments": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutHeaderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method POST
     *
     * Create a new expensesinoutheader
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ExpenseCategory string required. Example: "Example ExpenseCategory"
     * @bodyParam NoOfExpenseItems string required. Example: "Example NoOfExpenseItems"
     * @bodyParam TotalAmount number required. numeric. Example: 1
     * @bodyParam ExpenseDate string required. date. Example: "Example ExpenseDate"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam Comments string required. Example: "Example Comments"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "expense": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "expense_category": "Example value",
     *                 "number_of_expense_items": "Example value",
     *                 "total_amount": "Example value",
     *                 "expense_date": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "comments": "Example value",
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
     * @return ExpensesInOutHeaderResource
     */
    public function store(StoreExpensesInOutHeaderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $expense = $this->expensesService->createExpense($validatedData);

            return $this->successResponse([
                'message' => 'Expense created successfully',
                'expense' => new ExpensesInOutHeaderResource($expense)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating expense: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create expense',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method GET
     *
     * Get a specific expensesinoutheader
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutheader to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "expense_category": "Example value",
     *                 "number_of_expense_items": "Example value",
     *                 "total_amount": "Example value",
     *                 "expense_date": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "comments": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutHeaderResource
     */
    public function show(ExpensesInOutHeader $expensesInOutHeader)
    {
        //
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method GET
     *
     * Edit expensesinoutheader
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the expensesinoutheader to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "expense_category": "Example value",
     *                 "number_of_expense_items": "Example value",
     *                 "total_amount": "Example value",
     *                 "expense_date": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "comments": "Example value",
     *                 "is_deleted": true,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutHeaderResource
     */
    public function edit(ExpensesInOutHeader $expensesInOutHeader)
    {
        //
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method PUT
     *
     * Update an existing expensesinoutheader
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutheader to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ExpenseCategory string optional. Example: "Example ExpenseCategory"
     * @bodyParam NoOfExpenseItems string optional. Example: "Example NoOfExpenseItems"
     * @bodyParam TotalAmount number optional. numeric. Example: 1
     * @bodyParam ExpenseDate string optional. date. Example: "Example ExpenseDate"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam Comments string optional. Example: "Example Comments"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "expense_category": "Example value",
     *                 "number_of_expense_items": "Example value",
     *                 "total_amount": "Example value",
     *                 "expense_date": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "comments": "Example value",
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
     * @return ExpensesInOutHeaderResource
     */
    public function update(UpdateExpensesInOutHeaderRequest $request, ExpensesInOutHeader $expensesInOutHeader)
    {
        try {
            $validatedData = $request->validated();

            $updatedExpense = $this->expensesService->updateExpense($expensesInOutHeader, $validatedData);

            return $this->successResponse([
                'message' => 'Expense updated successfully',
                'expense' => new ExpensesInOutHeaderResource($updatedExpense)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating expense: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update expense',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ExpensesInOutHeader
     *
     * @method DELETE
     *
     * Delete a expensesinoutheader
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutheader to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesInOutHeader $expensesInOutHeader)
    {
        //
    }
}
