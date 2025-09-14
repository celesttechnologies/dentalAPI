<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'RoleId'         => 'sometimes|string|max:255',
            'ApplicationId'  => 'sometimes|string|max:255',
            'RoleName'       => 'sometimes|string|max:255',
            'LoweredRoleName'=> 'sometimes|string|max:255',
            'Description'    => 'nullable|string',
        ];
    }
}