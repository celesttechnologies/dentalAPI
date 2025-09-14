<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'RoleId'         => 'required|string|max:255',
            'ApplicationId'  => 'required|string|max:255',
            'RoleName'       => 'required|string|max:255',
            'LoweredRoleName'=> 'required|string|max:255',
            'Description'    => 'nullable|string',
        ];
    }
}