<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpensesInOutHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ExpenseCategory' => 'sometimes|string',
			'NoOfExpenseItems' => 'sometimes|string',
			'TotalAmount' => 'sometimes|numeric',
			'ExpenseDate' => 'sometimes|date',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'Comments' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}