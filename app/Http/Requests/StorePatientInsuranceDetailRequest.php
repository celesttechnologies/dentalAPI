<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientInsuranceDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'IsDentalInsurance' => 'required|string',
			'IsOrthodonticInsurance' => 'required|string',
			'PrimaryInsurerName' => 'required|string',
			'PrimarySubscriberID' => 'required|string|max:255',
			'PrimaryGroupNo' => 'required|string',
			'SecondaryInsurerName' => 'required|string',
			'SecondarySubscriberID' => 'required|string|max:255',
			'SecondaryGroupNo' => 'required|string',
			'TertiaryInsurerName' => 'required|string',
			'TertiarySubscriberID' => 'required|string|max:255',
			'TertiaryGroupNo' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}