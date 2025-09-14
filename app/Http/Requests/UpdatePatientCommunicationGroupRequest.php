<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientCommunicationGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CommunicationGroupMasterGuid' => 'sometimes|string|max:255',
			'PatientID' => 'sometimes|string|max:255',
			'ClinicID' => 'sometimes|string|max:255',
			'GroupType' => 'sometimes|string',
			'GroupName' => 'sometimes|string',
			'GroupDescription' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'LastUpdatedBy' => 'sometimes|date',
			'LastUpdatedOn' => 'sometimes|date',
        ];
    }
}