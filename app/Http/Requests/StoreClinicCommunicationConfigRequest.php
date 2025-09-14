<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicCommunicationConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'ClinicCommunicationMasterID' => 'required|string|max:255',
			'AttributeValue1' => 'required|string',
			'AttributeValue2' => 'required|string',
			'IsActive' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}