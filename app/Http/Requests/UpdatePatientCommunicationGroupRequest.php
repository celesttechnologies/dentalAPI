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
			'CommunicationGroupMasterGuid' => 'nullable|string|max:255',
			'PatientID' => 'nullable|string|max:255',
			'ClinicID' => 'nullable|string|max:255',
			'GroupType' => 'nullable|string',
			'GroupName' => 'nullable|string',
			'GroupDescription' => 'nullable|string',
			'IsDeleted' => 'nullable|string',
			'CreatedBy' => 'nullable|string',
			'CreatedOn' => 'nullable|string',
			'LastUpdatedBy' => 'nullable|date',
			'LastUpdatedOn' => 'nullable|date',
        ];
    }
}