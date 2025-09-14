<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientTreatmentsPlanDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'TreatmentPlanName' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'TreatmentCost' => 'required|numeric',
			'TreatmentTotalCost' => 'required|numeric',
			'TreatmentDiscount' => 'required|numeric',
			'TreatmentAddition' => 'required|numeric',
			'TreatmentDate' => 'required|date',
			'TreatmentDetails' => 'required|array',
			'TreatmentDetails.*.TreatmentTypeID' => 'required|string|max:255',
			'TreatmentDetails.*.TeethTreatment' => 'required|string',
			'TreatmentDetails.*.TeethTreatmentNote' => 'required|string',
			'TreatmentDetails.*.TreatmentCost' => 'required|numeric',
			'TreatmentDetails.*.TreatmentDiscount' => 'required|numeric',
			'TreatmentDetails.*.TreatmentAddition' => 'required|numeric',
        ];
    }
}