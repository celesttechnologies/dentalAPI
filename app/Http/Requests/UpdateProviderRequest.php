<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ProviderID' => 'sometimes|string|max:255',
			'ClinicID' => 'sometimes|string|max:255',
			'ProviderName' => 'sometimes|string|max:255',
			'Location' => 'sometimes|string',
			'Email' => 'sometimes|email|max:255',
			'Experience' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'ProviderImage' => 'sometimes|string|max:255',
			'PhoneNumber' => 'sometimes|string',
			'rowguid' => 'sometimes|string|max:255',
			'Sequence' => 'sometimes|string',
			'Attribute1' => 'sometimes|string',
			'Attribute2' => 'sometimes|string',
			'Attribute3' => 'sometimes|string',
			'Category' => 'sometimes|string',
			'RegistrationNumber' => 'sometimes|string',
			'DisplayInAppointmentsView' => 'sometimes|string',
			'UserID' => 'sometimes|string|max:255',
			'IncentiveType' => 'sometimes|string',
			'IncentiveValue' => 'sometimes|string',
			'ColorCode' => 'sometimes|string',
        ];
    }
}