<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientClinicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClientID'   => 'required|string|max:255',
            'ClinicID'   => 'required|string|max:255',
            'RelationshipType' => 'required|string|max:100',
            'CreatedOn'  => 'nullable|date',
            'CreatedBy'  => 'nullable|string|max:255',
        ];
    }
}