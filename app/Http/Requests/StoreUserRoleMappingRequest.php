<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRoleMappingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'MappingID' => 'required|string|max:255',
            'UserID'    => 'required|string|max:255',
            'RoleID'    => 'required|string|max:255',
            'AssignedOn'=> 'required|date',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}