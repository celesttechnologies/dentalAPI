<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PatientSettingID' => 'sometimes|string|max:255',
            'CreditCardValidTo'=> 'nullable|string|max:50',
            'IsDeleted'        => 'nullable|boolean',
            'AddedOn'          => 'nullable|date',
            'AddedBy'          => 'nullable|string|max:255',
            'LastUpdatedOn'    => 'nullable|date',
            'LastUpdatedBy'    => 'nullable|string|max:255',
            'SettingID'        => 'sometimes|integer',
            'ID'               => 'nullable|integer',
            'rowguid'          => 'nullable|string|max:255',
        ];
    }
}