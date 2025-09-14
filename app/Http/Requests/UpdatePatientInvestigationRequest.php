<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientInvestigationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'DateOfInvestigation' => 'sometimes|date',
			'Weight' => 'sometimes|string',
			'BloodPressure' => 'sometimes|string',
			'FBS' => 'sometimes|string',
			'PLBS' => 'sometimes|string',
			'HbAC' => 'sometimes|string',
			'LDL' => 'sometimes|string',
			'ACR' => 'sometimes|string',
			'Retina' => 'sometimes|string',
			'Urine' => 'sometimes|string',
			'Others' => 'sometimes|string',
			'Custom1' => 'sometimes|string',
			'Custom2' => 'sometimes|string',
			'Custom3' => 'sometimes|string',
			'Custom4' => 'sometimes|string',
			'Custom5' => 'sometimes|string',
			'Custom6' => 'sometimes|string',
			'Custom7' => 'sometimes|string',
			'Custom8' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}