<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ExpenseID'    => 'required|string|max:255',
            'Category'     => 'required|string|max:255',
            'Amount'       => 'required|numeric',
            'ExpenseDate'  => 'required|date',
            'Description'  => 'nullable|string'
        ];
    }
}