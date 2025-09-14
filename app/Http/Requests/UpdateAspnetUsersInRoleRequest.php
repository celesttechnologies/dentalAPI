<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetUsersInRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId' => 'sometimes|string|max:255',
            'RoleId' => 'sometimes|string|max:255',
        ];
    }
}