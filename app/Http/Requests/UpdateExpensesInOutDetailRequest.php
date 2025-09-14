<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpensesInOutDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ExpensesHeaderID' => 'sometimes|string|max:255',
			'ExpensesTypeID' => 'sometimes|string|max:255',
			'OtherExpenses' => 'sometimes|string',
			'Amount' => 'sometimes|numeric',
			'PaidBy' => 'sometimes|string|max:255',
        ];
    }
}