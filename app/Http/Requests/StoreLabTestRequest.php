<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'TestID'        => 'required|string|max:255',
            'PatientID'     => 'required|string|max:255',
            'TestType'      => 'required|string|max:255',
            'TestResult'    => 'nullable|string',
            'TestDate'      => 'required|date',
            'CreatedBy'     => 'nullable|string|max:255'
        ];
    }
}