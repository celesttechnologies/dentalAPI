<?php

namespace App\Http\Controllers;

use App\Models\ExpensesInOutDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ExpensesInOutDetailService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ExpensesInOutDetailResource;
use App\Http\Requests\StoreExpensesInOutDetailRequest;
use App\Http\Requests\UpdateExpensesInOutDetailRequest;

class ExpensesInOutDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private ExpensesInOutDetailService $expensesService)
    {
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method GET
     *
     * List all expensesinoutdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expenses_in_out_details": [
     *                 {
     *                     "id": 1,
     *                     "expenses_header_id": 1,
     *                     "expenses_type_id": 1,
     *                     "other_expenses": "Example value",
     *                     "amount": "Example value",
     *                     "paid_by": 1
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
            $data = $this->expensesService->getExpensesInOutDetails($perPage);

            return $this->successResponse([
                'expenses_in_out_details' => ExpensesInOutDetailResource::collection($data['details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Expenses In Out Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ExpensesInOutDetail
     *
     * @method GET
     *
     * Create expensesinoutdetail
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense_detail": {
     *                 "id": 1,
     *                 "expenses_header_id": 1,
     *                 "expenses_type_id": 1,
     *                 "other_expenses": "Example value",
     *                 "amount": "Example value",
     *                 "paid_by": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutDetailResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method POST
     *
     * Create a new expensesinoutdetail
     *
     * @post /
     *
     * @bodyParam ExpensesHeaderID string required. Maximum length: 255. Example: "Example ExpensesHeaderID"
     * @bodyParam ExpensesTypeID string required. Maximum length: 255. Example: "Example ExpensesTypeID"
     * @bodyParam OtherExpenses string required. Example: "Example OtherExpenses"
     * @bodyParam Amount number required. numeric. Example: 1
     * @bodyParam PaidBy string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "expense_detail": {
     *                 "id": 1,
     *                 "expenses_header_id": 1,
     *                 "expenses_type_id": 1,
     *                 "other_expenses": "Example value",
     *                 "amount": "Example value",
     *                 "paid_by": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutDetailResource
     */
    public function store(StoreExpensesInOutDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $expenseDetail = $this->expensesService->createExpenseDetail($validatedData);

            return $this->successResponse([
                'message' => 'Expense detail created successfully',
                'expense_detail' => new ExpensesInOutDetailResource($expenseDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating expense detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create expense detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method GET
     *
     * Get a specific expensesinoutdetail
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutdetail to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense_detail": {
     *                 "id": 1,
     *                 "expenses_header_id": 1,
     *                 "expenses_type_id": 1,
     *                 "other_expenses": "Example value",
     *                 "amount": "Example value",
     *                 "paid_by": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutDetailResource
     */
    public function show(ExpensesInOutDetail $expensesInOutDetail)
    {
        //
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method GET
     *
     * Edit expensesinoutdetail
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the expensesinoutdetail to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense_detail": {
     *                 "id": 1,
     *                 "expenses_header_id": 1,
     *                 "expenses_type_id": 1,
     *                 "other_expenses": "Example value",
     *                 "amount": "Example value",
     *                 "paid_by": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutDetailResource
     */
    public function edit(ExpensesInOutDetail $expensesInOutDetail)
    {
        //
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method PUT
     *
     * Update an existing expensesinoutdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutdetail to update. Example: 1
     *
     * @bodyParam ExpensesHeaderID string optional. Maximum length: 255. Example: "Example ExpensesHeaderID"
     * @bodyParam ExpensesTypeID string optional. Maximum length: 255. Example: "Example ExpensesTypeID"
     * @bodyParam OtherExpenses string optional. Example: "Example OtherExpenses"
     * @bodyParam Amount number optional. numeric. Example: 1
     * @bodyParam PaidBy string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "expense_detail": {
     *                 "id": 1,
     *                 "expenses_header_id": 1,
     *                 "expenses_type_id": 1,
     *                 "other_expenses": "Example value",
     *                 "amount": "Example value",
     *                 "paid_by": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ExpensesInOutDetailResource
     */
    public function update(UpdateExpensesInOutDetailRequest $request, ExpensesInOutDetail $expensesInOutDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedExpenseDetail = $this->expensesService->updateExpenseDetail($expensesInOutDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Expense detail updated successfully',
                'expense_detail' => new ExpensesInOutDetailResource($updatedExpenseDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating expense detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update expense detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ExpensesInOutDetail
     *
     * @method DELETE
     *
     * Delete a expensesinoutdetail
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the expensesinoutdetail to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesInOutDetail $expensesInOutDetail)
    {
        //
    }
}
