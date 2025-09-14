<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'InsuranceID'   => 'required|string|max:255',
            'PatientID'     => 'required|string|max:255',
            'Provider'      => 'required|string|max:255',
            'PolicyNumber'  => 'required|string|max:100',
            'CoverageDetails' => 'nullable|string',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}