<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'TestID'        => 'sometimes|string|max:255',
            'PatientID'     => 'sometimes|string|max:255',
            'TestType'      => 'sometimes|string|max:255',
            'TestResult'    => 'nullable|string',
            'TestDate'      => 'sometimes|date',
            'CreatedBy'     => 'nullable|string|max:255'
        ];
    }
}