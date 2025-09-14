<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcgExternalRefferalMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicId' => 'required|string|max:255',
			'RefferalName' => 'required|string',
			'MobileNumber' => 'required|string',
			'CountryDialCode' => 'required|string',
			'Description' => 'required|string',
			'EmailId' => 'required|email|max:255',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}