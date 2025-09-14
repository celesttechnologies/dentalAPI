<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRoleMappingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'MappingID' => 'sometimes|string|max:255',
            'UserID'    => 'sometimes|string|max:255',
            'RoleID'    => 'sometimes|string|max:255',
            'AssignedOn'=> 'sometimes|date',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}