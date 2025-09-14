<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpensesInOutHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'ExpenseCategory' => 'required|string',
			'NoOfExpenseItems' => 'required|string',
			'TotalAmount' => 'required|numeric',
			'ExpenseDate' => 'required|date',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'Comments' => 'required|string',
			'IsDeleted' => 'required|string',
			'rowguid' => 'required|string|max:255',
        ];
    }
}