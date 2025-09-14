<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientTreatmentsPlanHeaderRequest extends FormRequest
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
			'TreatmentPlanName' => 'required|string',
			'TreatmentCost' => 'required|numeric',
			'TreatmentDiscount' => 'required|string',
			'TreatmentTax' => 'required|string',
			'TreatmentTotalCost' => 'required|numeric',
			'TreatmentDate' => 'required|date',
			'ProviderInchargeID' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'AddedBy' => 'required|string',
			'AddedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'IsArchived' => 'required|string',
			'ParentPatientTreatmentDoneID' => 'required|string|max:255',
			'TreatmentAddition' => 'required|string',
			'TreatmentPlanStatusID' => 'required|string|max:255',
        ];
    }
}