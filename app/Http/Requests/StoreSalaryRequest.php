<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'SalaryID'    => 'required|string|max:255',
            'EmployeeID'  => 'required|string|max:255',
            'Amount'      => 'required|numeric',
            'PaidOn'      => 'required|date',
            'Remarks'     => 'nullable|string'
        ];
    }
}