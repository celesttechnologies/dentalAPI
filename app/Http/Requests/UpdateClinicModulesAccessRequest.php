<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicModulesAccessRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'LicenseModuleID' => 'sometimes|string|max:255',
			'ModuleCode' => 'sometimes|string',
			'IsLicensed' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}