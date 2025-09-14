<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicCommunicationMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ClinicCommunicationMasterID'   => 'sometimes|string|max:255',
            'CommunicationMasterTypeID'       => 'nullable|integer',
            'CommunicationMasterSubTypeID'    => 'nullable|integer',
            'CommunicationMasterSubTypeCode'  => 'nullable|string|max:50',
            'Category'                        => 'nullable|string|max:100',
            'Description'                     => 'nullable|string',
            'CommunicationExecutionType'      => 'nullable|integer',
            'Attribute1'                      => 'nullable|string|max:255',
            'DefaultAttributeValue1'          => 'nullable|string|max:255',
            'Attribute2'                      => 'nullable|string|max:255',
            'DefaultAttributeValue2'          => 'nullable|string|max:255',
            'CreatedOn'                       => 'nullable|date',
            'CreatedBy'                       => 'nullable|string|max:255',
            'LastUpdatedOn'                   => 'nullable|date',
            'LastUpdatedBy'                   => 'nullable|string|max:255',
        ];
    }
}