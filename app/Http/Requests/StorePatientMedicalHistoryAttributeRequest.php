<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientMedicalHistoryAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'MedicalAttributesCategory' => 'required|string',
			'MedicalAttributesID' => 'nullable|string|max:255',
			'MedicalAttributeValue' => 'required|string',
			'MedicalAttributeText' => 'required|string',
			'MedicalHistoryDate' => 'required|date',
			'LastUpdatedBy' => 'nullable|date',
			'LastUpdatedOn' => 'nullable|date',
        ];
    }
}