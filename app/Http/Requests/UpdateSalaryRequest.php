<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'SalaryID'    => 'sometimes|string|max:255',
            'EmployeeID'  => 'sometimes|string|max:255',
            'Amount'      => 'sometimes|numeric',
            'PaidOn'      => 'sometimes|date',
            'Remarks'     => 'nullable|string'
        ];
    }
}