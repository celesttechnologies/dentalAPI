<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientPersonalAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'PatientAttributeID' => 'required|string|max:255',
			'PatientAttributeData' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}