<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDentalHistoryAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'DentalHistoryAttributesCategory' => 'required|string',
			'DentalHistoryAttributeID' => 'required|string|max:255',
			'DentalHistoryAttributeValue' => 'required|string',
			'DentalHistoryAttributeText' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}