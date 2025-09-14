<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ProviderName' => 'nullable|string|max:255',
			'Location' => 'nullable|string',
			'Email' => 'nullable|email|max:255',
			'Experience' => 'nullable|string',
			'IsDeleted' => 'nullable|string',
			'ProviderImage' => 'nullable|string|max:255',
			'PhoneNumber' => 'nullable|string',
			'rowguid' => 'nullable|string|max:255',
			'Sequence' => 'nullable|string',
			'Attribute1' => 'nullable|string',
			'Attribute2' => 'nullable|string',
			'Attribute3' => 'nullable|string',
			'Category' => 'nullable|string',
			'RegistrationNumber' => 'nullable|string',
			'DisplayInAppointmentsView' => 'nullable|string',
			'IncentiveType' => 'nullable|numeric',
			'IncentiveValue' => 'nullable|numeric',
			'ColorCode' => 'nullable|string',
        ];
    }
}