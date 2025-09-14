<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientConsentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ConsentID'   => 'required|string|max:255',
            'PatientID'   => 'required|string|max:255',
            'ConsentText' => 'required|string',
            'ConsentDate' => 'required|date',
            'SignedBy'    => 'nullable|string|max:255',
        ];
    }
}