<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CustomerName' => 'required|string',
			'RegistrationNo' => 'required|string',
			'ContactPerson' => 'required|string',
			'Notes' => 'required|string',
			'Street1' => 'required|string',
			'Street2' => 'nullable|string',
			'City' => 'required|string',
			'State' => 'required|string',
			'Country' => 'required|string',
			'Postcode' => 'required|string',
			'ISD' => 'nullable|string',
			'STD' => 'nullable|string',
			'Phone' => 'required|string',
			'PermanentAddress' => 'nullable|string',
        ];
    }
}