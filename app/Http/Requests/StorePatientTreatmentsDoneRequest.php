<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientTreatmentsDoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
		return [
			'WaitingAreaID' => 'nullable|string',
			'ProviderID' => 'required|string|max:255',
			'TreatmentCost' => 'required_if:WaitingAreaID,null|numeric',
			'TreatmentDiscount' => 'required_if:WaitingAreaID,null|numeric',
			'TreatmentTotalCost' => 'required_if:WaitingAreaID,null|numeric',
			'TreatmentPayment' => 'required_if:WaitingAreaID,null|numeric',
			'TreatmentDate' => 'required_if:WaitingAreaID,null|date',
			'ParentPatientTreatmentDoneID' => 'required_if:WaitingAreaID,null|string|max:255',
			'TreatmentAddition' => 'required_if:WaitingAreaID,null|string',
			'TeethTreatmentNote' => 'required_if:WaitingAreaID,null|string',
			'TreatmentTypeID' => 'required_if:WaitingAreaID,null|string|max:255',
			'TreatmentSubTypeID' => 'required_if:WaitingAreaID,null|string|max:255',
			'TeethTreatment' => 'required_if:WaitingAreaID,null|string',
			'isPrimaryTooth' => 'required_if:WaitingAreaID,null|boolean',
		];
    }
}