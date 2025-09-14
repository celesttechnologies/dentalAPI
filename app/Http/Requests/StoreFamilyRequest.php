<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'FamilyName' => 'required|string',
			'FamilyNotes' => 'required|string',
			'AddressLine1' => 'required|string',
			'AddressLine2' => 'required|string',
			'Street' => 'required|string',
			'Area' => 'required|string',
			'City' => 'required|string',
			'State' => 'required|string',
			'Country' => 'required|string',
			'ZipCode' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
			'FamilyNo' => 'required|string',
			'FamilyCode' => 'required|string',
        ];
    }
}