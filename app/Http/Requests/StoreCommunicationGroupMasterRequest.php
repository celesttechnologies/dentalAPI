<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommunicationGroupMasterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CommunicationGroupMasterGuid'=> 'required|string|max:255',
            'GroupName'                   => 'nullable|string|max:255',
            'ClinicID'                    => 'nullable|string|max:255',
            'GroupType'                   => 'required|integer',
            'GroupDescription'            => 'nullable|string',
            'IsDeleted'                   => 'nullable|boolean',
            'CreatedBy'                   => 'nullable|string|max:255',
            'CreatedOn'                   => 'required|date',
            'LastUpdatedBy'               => 'nullable|string|max:255',
            'LastUpdatedOn'               => 'required|date',
            'IsPatientGroup'              => 'nullable|boolean',
            'IsOtherGroup'                => 'nullable|boolean',
        ];
    }
}