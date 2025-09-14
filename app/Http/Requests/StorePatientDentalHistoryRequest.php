<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDentalHistoryRequest extends FormRequest
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
			'Notes' => 'required|string',
			'TeethTreatments' => 'required|string',
			'IsDeleted' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}