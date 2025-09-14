<?php

namespace App\Services;

use App\Models\ExpensesInOutDetail;
use App\Http\Resources\ExpensesInOutDetailResource;

class ExpensesInOutDetailService
{
    /**
     * Get a paginated list of Expenses In Out Details.
     *
     * @param int $perPage
     * @return array
     */
    public function getExpensesInOutDetails(int $perPage): array
    {
        $data = ExpensesInOutDetail::paginate($perPage);

        return [
            'details' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new expense detail record.
     *
     * @param array $data The validated data for creating the expense detail
     * @return ExpensesInOutDetail The newly created expense detail model
     */
    public function createExpenseDetail(array $data): ExpensesInOutDetail
    {
        return ExpensesInOutDetail::create($data);
    }

    /**
     * Update an existing expense detail record.
     *
     * @param ExpensesInOutDetail $expensesInOutDetail The expense detail model to update
     * @param array $data The validated data for updating the expense detail
     * @return ExpensesInOutDetail The updated expense detail model
     */
    public function updateExpenseDetail(ExpensesInOutDetail $expensesInOutDetail, array $data): ExpensesInOutDetail
    {
        $expensesInOutDetail->update($data);
        return $expensesInOutDetail;
    }
}