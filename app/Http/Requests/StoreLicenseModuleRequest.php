<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicenseModuleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ModuleCode' => 'required|string',
			'ModuleName' => 'required|string',
			'ModuleDescription' => 'required|string',
			'OrderNumber' => 'required|string',
			'PreRequisitesCSV' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
        ];
    }
}