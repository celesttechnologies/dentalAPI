<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAspnetUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'           => 'sometimes|string|max:255',
            'ApplicationId'    => 'sometimes|string|max:255',
            'UserName'         => 'sometimes|string|max:255',
            'LoweredUserName'  => 'sometimes|string|max:255',
            'MobileAlias'      => 'nullable|string|max:255',
            'IsAnonymous'      => 'sometimes|boolean',
            'LastActivityDate' => 'sometimes|date',
        ];
    }
}