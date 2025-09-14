<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientLabRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'DateOfLabWork' => 'required|date',
			'TimeOfLabWork' => 'required|string',
			'Work' => 'required|string',
			'Shade' => 'required|string',
			'MT' => 'required|string',
			'Bisque' => 'required|string',
			'Finish' => 'required|string',
			'Denture' => 'required|string',
			'DelDate' => 'required|date',
			'DelTime' => 'required|string',
			'RecDate' => 'required|date',
			'Remark' => 'required|string',
			'RecTime' => 'required|string',
			'LabID' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'ReferenceNo' => 'required|string',
			'rowguid' => 'required|string|max:255',
        ];
    }
}