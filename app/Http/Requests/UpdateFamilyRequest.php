<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'FamilyName' => 'sometimes|string',
			'FamilyNotes' => 'sometimes|string',
			'AddressLine1' => 'sometimes|string',
			'AddressLine2' => 'sometimes|string',
			'Street' => 'sometimes|string',
			'Area' => 'sometimes|string',
			'City' => 'sometimes|string',
			'State' => 'sometimes|string',
			'Country' => 'sometimes|string',
			'ZipCode' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'FamilyNo' => 'sometimes|string',
			'FamilyCode' => 'sometimes|string',
        ];
    }
}