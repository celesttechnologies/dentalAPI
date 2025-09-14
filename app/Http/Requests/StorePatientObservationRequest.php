<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientObservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'TreatmentTypeID' => 'required|string|max:255',
			'DateOfHistroy' => 'required|date',
			'Description' => 'required|string',
			'TeethTreatments' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'ProviderID' => 'required|string|max:255',
			'rowguid' => 'required|string|max:255',
        ];
    }
}