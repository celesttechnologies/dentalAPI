<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'RoleID' => 'required|string|max:255',
            'ClientID' => 'required|string|max:255',
            'UserName' => 'required|string|max:255|unique:users,UserName',
            'Password' => 'required|string|min:8',
            'Email' => 'required|email|unique:users,Email',
            'Name' => 'required|string|max:255',
            'Mobile' => 'nullable|string|max:15',
        ];
    }
}