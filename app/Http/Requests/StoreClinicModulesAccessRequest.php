<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicModulesAccessRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'LicenseModuleID' => 'required|string|max:255',
			'ModuleCode' => 'required|string',
			'IsLicensed' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}