<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientAllergyAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'AllergyAttributesCategory' => 'sometimes|string',
			'AllergyAttributesID' => 'sometimes|string|max:255',
			'AllergyAttributeValue' => 'sometimes|string',
			'AllergyAttributeText' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}