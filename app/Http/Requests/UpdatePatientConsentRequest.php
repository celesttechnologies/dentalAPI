<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientConsentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'ConsentID'   => 'sometimes|string|max:255',
            'PatientID'   => 'sometimes|string|max:255',
            'ConsentText' => 'sometimes|string',
            'ConsentDate' => 'sometimes|date',
            'SignedBy'    => 'nullable|string|max:255',
        ];
    }
}