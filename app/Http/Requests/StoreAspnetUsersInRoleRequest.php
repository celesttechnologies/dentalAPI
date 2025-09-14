<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetUsersInRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId' => 'required|string|max:255',
            'RoleId' => 'required|string|max:255',
        ];
    }
}