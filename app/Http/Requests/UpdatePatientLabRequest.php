<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientLabRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'DateOfLabWork' => 'sometimes|date',
			'TimeOfLabWork' => 'sometimes|string',
			'Work' => 'sometimes|string',
			'Shade' => 'sometimes|string',
			'MT' => 'sometimes|string',
			'Bisque' => 'sometimes|string',
			'Finish' => 'sometimes|string',
			'Denture' => 'sometimes|string',
			'DelDate' => 'sometimes|date',
			'DelTime' => 'sometimes|string',
			'RecDate' => 'sometimes|date',
			'Remark' => 'sometimes|string',
			'RecTime' => 'sometimes|string',
			'LabID' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'ReferenceNo' => 'sometimes|string',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}