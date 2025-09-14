<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientAllergyAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'AllergyAttributesCategory' => 'required|string',
			'AllergyAttributesID' => 'required|string|max:255',
			'AllergyAttributeValue' => 'required|string',
			'AllergyAttributeText' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}