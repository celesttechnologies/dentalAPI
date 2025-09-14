<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ExpenseID'    => 'sometimes|string|max:255',
            'Category'     => 'sometimes|string|max:255',
            'Amount'       => 'sometimes|numeric',
            'ExpenseDate'  => 'sometimes|date',
            'Description'  => 'nullable|string'
        ];
    }
}