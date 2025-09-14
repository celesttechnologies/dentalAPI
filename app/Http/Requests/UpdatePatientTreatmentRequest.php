<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTreatmentRequest extends FormRequest
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
			'TreatmentTypeID' => 'sometimes|string|max:255',
			'TeethTreatment' => 'sometimes|string',
			'TreatmentDetails' => 'sometimes|string',
			'TreamentCost' => 'sometimes|numeric',
			'TreatmentPayment' => 'sometimes|string',
			'TreatmentBalance' => 'sometimes|string',
			'TreatmentDate' => 'sometimes|date',
			'ProviderInchargeID' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'AddedBy' => 'sometimes|string',
			'AddedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}