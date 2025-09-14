<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CustomerName' => 'nullable|string',
			'RegistrationNo' => 'nullable|string',
			'ContactPerson' => 'nullable|string',
			'Notes' => 'nullable|string',
			'Street1' => 'nullable|string',
			'Street2' => 'nullable|string',
			'City' => 'nullable|string',
			'State' => 'nullable|string',
			'Country' => 'nullable|string',
			'Postcode' => 'nullable|string',
			'ISD' => 'nullable|string',
			'STD' => 'nullable|string',
			'Phone' => 'nullable|string',
			'PermanentAddress' => 'nullable|string',
        ];
    }
}