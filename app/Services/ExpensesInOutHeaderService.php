<?php

namespace App\Services;

use App\Models\ExpensesInOutHeader;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ExpensesInOutHeaderResource;

class ExpensesInOutHeaderService
{
    /**
     * Get a paginated list of Expenses In Out Headers.
     *
     * @param int $perPage
     * @return array
     */
    public function getExpensesInOutHeaders(int $perPage): array
    {
        $data = ExpensesInOutHeader::paginate($perPage);

        return [
            'headers' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new expense record.
     *
     * @param array $data The validated data for creating the expense
     * @return ExpensesInOutHeader The newly created expense model
     */
    public function createExpense(array $data): ExpensesInOutHeader
    {
        return ExpensesInOutHeader::create($data);
    }

    /**
     * Update an existing expense record.
     *
     * @param ExpensesInOutHeader $expensesInOutHeader The expense model to update
     * @param array $data The validated data for updating the expense
     * @return ExpensesInOutHeader The updated expense model
     */
    public function updateExpense(ExpensesInOutHeader $expensesInOutHeader, array $data): ExpensesInOutHeader
    {
        $expensesInOutHeader->update($data);
        return $expensesInOutHeader;
    }
}