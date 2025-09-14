<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTreatmentsPlanDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientTreatmentPlanHeaderID' => 'sometimes|string|max:255',
			'TreatmentTypeID' => 'sometimes|string|max:255',
			'TreatmentSubTypeID' => 'sometimes|string|max:255',
			'TeethTreatment' => 'sometimes|string',
			'TeethTreatmentNote' => 'sometimes|string',
			'TreatmentCost' => 'sometimes|numeric',
			'Discount' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'IsExpanded' => 'sometimes|string',
			'TreatmentTotalCost' => 'sometimes|numeric',
			'TreatmentTax' => 'sometimes|string',
			'Addition' => 'sometimes|string',
        ];
    }
}