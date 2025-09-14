<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientInvestigationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'DateOfInvestigation' => 'required|date',
			'Weight' => 'required|string',
			'BloodPressure' => 'required|string',
			'FBS' => 'required|string',
			'PLBS' => 'required|string',
			'HbAC' => 'required|string',
			'LDL' => 'required|string',
			'ACR' => 'required|string',
			'Retina' => 'required|string',
			'Urine' => 'required|string',
			'Others' => 'required|string',
			'Custom1' => 'required|string',
			'Custom2' => 'required|string',
			'Custom3' => 'required|string',
			'Custom4' => 'required|string',
			'Custom5' => 'required|string',
			'Custom6' => 'required|string',
			'Custom7' => 'required|string',
			'Custom8' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}