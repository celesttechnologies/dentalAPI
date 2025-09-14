<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'RoleID' => 'sometimes|string|max:255',
            'ClientID' => 'sometimes|string|max:255',
            'UserName' => 'sometimes|string|max:255|unique:users,UserName,' . $this->route('user'),
            'Password' => 'nullable|string|min:8',
            'Email' => 'sometimes|email|unique:users,Email,' . $this->route('user'),
            'Name' => 'sometimes|string|max:255',
            'Mobile' => 'nullable|string|max:15',
        ];
    }
}