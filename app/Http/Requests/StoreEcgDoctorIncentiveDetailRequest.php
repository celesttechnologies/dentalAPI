<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcgDoctorIncentiveDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'IncetiveId' => 'required|string|max:255',
			'PatientTreatmentDoneID' => 'required|string|max:255',
			'TreatmentTotalCost' => 'required|numeric',
			'IncentiveAmount' => 'required|numeric',
			'IncentiveType' => 'required|string',
			'IncentiveValue' => 'required|string',
			'IsDeleted' => 'required|string',
			'AddedBy' => 'required|string',
			'AddedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}