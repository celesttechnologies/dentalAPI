<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEcgDoctorIncentiveDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'IncetiveId' => 'sometimes|string|max:255',
			'PatientTreatmentDoneID' => 'sometimes|string|max:255',
			'TreatmentTotalCost' => 'sometimes|numeric',
			'IncentiveAmount' => 'sometimes|numeric',
			'IncentiveType' => 'sometimes|string',
			'IncentiveValue' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'AddedBy' => 'sometimes|string',
			'AddedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}