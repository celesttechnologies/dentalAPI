<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientInsuranceDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'IsDentalInsurance' => 'sometimes|string',
			'IsOrthodonticInsurance' => 'sometimes|string',
			'PrimaryInsurerName' => 'sometimes|string',
			'PrimarySubscriberID' => 'sometimes|string|max:255',
			'PrimaryGroupNo' => 'sometimes|string',
			'SecondaryInsurerName' => 'sometimes|string',
			'SecondarySubscriberID' => 'sometimes|string|max:255',
			'SecondaryGroupNo' => 'sometimes|string',
			'TertiaryInsurerName' => 'sometimes|string',
			'TertiarySubscriberID' => 'sometimes|string|max:255',
			'TertiaryGroupNo' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}