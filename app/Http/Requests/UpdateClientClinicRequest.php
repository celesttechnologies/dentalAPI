<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientClinicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClientID'   => 'sometimes|string|max:255',
            'ClinicID'   => 'sometimes|string|max:255',
            'RelationshipType' => 'sometimes|string|max:100',
            'CreatedOn'  => 'nullable|date',
            'CreatedBy'  => 'nullable|string|max:255',
        ];
    }
}