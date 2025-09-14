<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLicenseModuleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ModuleCode' => 'sometimes|string',
			'ModuleName' => 'sometimes|string',
			'ModuleDescription' => 'sometimes|string',
			'OrderNumber' => 'sometimes|string',
			'PreRequisitesCSV' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
        ];
    }
}