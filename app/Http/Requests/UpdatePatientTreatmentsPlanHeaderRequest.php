<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTreatmentsPlanHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'TreatmentPlanName' => 'sometimes|string',
			'TreatmentCost' => 'sometimes|numeric',
			'TreatmentDiscount' => 'sometimes|string',
			'TreatmentTax' => 'sometimes|string',
			'TreatmentTotalCost' => 'sometimes|numeric',
			'TreatmentDate' => 'sometimes|date',
			'ProviderInchargeID' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'AddedBy' => 'sometimes|string',
			'AddedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'IsArchived' => 'sometimes|string',
			'ParentPatientTreatmentDoneID' => 'sometimes|string|max:255',
			'TreatmentAddition' => 'sometimes|string',
			'TreatmentPlanStatusID' => 'sometimes|string|max:255',
        ];
    }
}