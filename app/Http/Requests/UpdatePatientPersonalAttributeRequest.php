<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientPersonalAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'PatientAttributeID' => 'sometimes|string|max:255',
			'PatientAttributeData' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}