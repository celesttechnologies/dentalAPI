<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInsuranceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'InsuranceID'   => 'sometimes|string|max:255',
            'PatientID'     => 'sometimes|string|max:255',
            'Provider'      => 'sometimes|string|max:255',
            'PolicyNumber'  => 'sometimes|string|max:100',
            'CoverageDetails' => 'nullable|string',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}