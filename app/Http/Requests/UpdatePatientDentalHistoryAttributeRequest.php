<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDentalHistoryAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'DentalHistoryAttributesCategory' => 'sometimes|string',
			'DentalHistoryAttributeID' => 'sometimes|string|max:255',
			'DentalHistoryAttributeValue' => 'sometimes|string',
			'DentalHistoryAttributeText' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}