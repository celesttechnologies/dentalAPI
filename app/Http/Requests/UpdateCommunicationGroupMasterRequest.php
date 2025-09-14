<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommunicationGroupMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CommunicationGroupMasterGuid'=> 'sometimes|string|max:255',
            'GroupName'                   => 'nullable|string|max:255',
            'ClinicID'                    => 'nullable|string|max:255',
            'GroupType'                   => 'sometimes|integer',
            'GroupDescription'            => 'nullable|string',
            'IsDeleted'                   => 'nullable|boolean',
            'CreatedBy'                   => 'nullable|string|max:255',
            'CreatedOn'                   => 'sometimes|date',
            'LastUpdatedBy'               => 'nullable|string|max:255',
            'LastUpdatedOn'               => 'sometimes|date',
            'IsPatientGroup'              => 'nullable|boolean',
            'IsOtherGroup'                => 'nullable|boolean',
        ];
    }
}