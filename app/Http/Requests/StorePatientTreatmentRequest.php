<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientTreatmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'TreatmentTypeID' => 'required|string|max:255',
			'TeethTreatment' => 'required|string',
			'TreatmentDetails' => 'required|string',
			'TreamentCost' => 'required|numeric',
			'TreatmentPayment' => 'required|string',
			'TreatmentBalance' => 'required|string',
			'TreatmentDate' => 'required|date',
			'ProviderInchargeID' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'AddedBy' => 'required|string',
			'AddedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}