<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientCommunicationGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'CommunicationGroupMasterGuid' => 'required|string|max:255',
			'PatientID' => 'required|string|max:255',
			'ClinicID' => 'required|string|max:255',
			'GroupType' => 'required|string',
			'GroupName' => 'required|string',
			'GroupDescription' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'LastUpdatedBy' => 'required|date',
			'LastUpdatedOn' => 'required|date',
        ];
    }
}