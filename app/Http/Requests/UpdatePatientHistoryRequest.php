<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'PatientDiagnosisID' => 'sometimes|string|max:255',
			'TreatmentTypeID' => 'sometimes|string|max:255',
			'DateOfHistroy' => 'sometimes|date',
			'Description' => 'sometimes|string',
			'TeethTreatments' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'ProviderID' => 'sometimes|string|max:255',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}