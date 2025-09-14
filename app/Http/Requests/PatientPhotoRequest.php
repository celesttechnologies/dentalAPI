<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
