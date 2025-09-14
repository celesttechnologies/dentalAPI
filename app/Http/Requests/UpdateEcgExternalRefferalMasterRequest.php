<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEcgExternalRefferalMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicId' => 'sometimes|string|max:255',
			'RefferalName' => 'sometimes|string',
			'MobileNumber' => 'sometimes|string',
			'CountryDialCode' => 'sometimes|string',
			'Description' => 'sometimes|string',
			'EmailId' => 'sometimes|email|max:255',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}