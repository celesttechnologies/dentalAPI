<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicCommunicationConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ClinicCommunicationMasterID' => 'sometimes|string|max:255',
			'AttributeValue1' => 'sometimes|string',
			'AttributeValue2' => 'sometimes|string',
			'IsActive' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}