<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateECGMRoleConfigurationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClinicRoleID'          => 'sometimes|string|max:255',
            'RoleID'                => 'sometimes|string|max:255',
            'LicenseModuleCodeCSV'  => 'nullable|string',
            'IsAdministratorRole'   => 'nullable|boolean',
            'IsActive'              => 'nullable|boolean',
            'DefaultImportance'     => 'nullable|integer',
            'CreatedOn'             => 'nullable|date',
            'CreatedBy'             => 'nullable|string|max:255',
            'LastUpdatedOn'         => 'nullable|date',
            'LastUpdatedBy'         => 'nullable|string|max:255',
        ];
    }
}