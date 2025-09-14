<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAspnetUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'UserId'           => 'required|string|max:255',
            'ApplicationId'    => 'required|string|max:255',
            'UserName'         => 'required|string|max:255',
            'LoweredUserName'  => 'required|string|max:255',
            'MobileAlias'      => 'nullable|string|max:255',
            'IsAnonymous'      => 'required|boolean',
            'LastActivityDate' => 'required|date',
        ];
    }
}