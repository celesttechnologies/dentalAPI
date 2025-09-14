<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDiagnosisRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'DateOfDiagnosis' => 'required|date',
			'ProviderID' => 'required|string|max:255',
			'ChiefComplaint' => 'required|string',
			'PatientDiagnosisNotes' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}