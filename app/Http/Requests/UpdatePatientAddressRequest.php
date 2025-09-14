<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'AddressTypeID' => 'sometimes|string|max:255',
			'AddressLine1' => 'sometimes|string',
			'AddressLine2' => 'sometimes|string',
			'Street' => 'sometimes|string',
			'Area' => 'sometimes|string',
			'City' => 'sometimes|string',
			'State' => 'sometimes|string',
			'Country' => 'sometimes|string',
			'ZipCode' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}