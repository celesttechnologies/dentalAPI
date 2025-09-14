<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Note' => 'sometimes|required|string',
            'LastUpdatedBy' => 'required|string',
        ];
    }
}
