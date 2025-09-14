<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpensesInOutDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ExpensesHeaderID' => 'required|string|max:255',
			'ExpensesTypeID' => 'required|string|max:255',
			'OtherExpenses' => 'required|string',
			'Amount' => 'required|numeric',
			'PaidBy' => 'required|string|max:255',
        ];
    }
}