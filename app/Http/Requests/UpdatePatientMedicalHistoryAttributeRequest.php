<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientMedicalHistoryAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'MedicalAttributesCategory' => 'sometimes|string',
			'MedicalAttributesID' => 'sometimes|string|max:255',
			'MedicalAttributeValue' => 'sometimes|string',
			'MedicalAttributeText' => 'sometimes|string',
			'MedicalHistoryDate' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}