<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SupplierName' => 'nullable|string',
			'RegistrationNo' => 'nullable|string',
			'ContactPerson' => 'nullable|string',
			'Notes' => 'nullable|string',
			'Street1' => 'nullable|string',
			'Street2' => 'nullable|string',
			'City' => 'nullable|string',
			'State' => 'nullable|string',
			'Country' => 'nullable|string',
			'Postcode' => 'nullable|string',
			'ISD' => 'nullable|string',
			'STD' => 'nullable|string',
			'Phone' => 'nullable|string',
			'PermanentAddress' => 'nullable|string',
			'AddedOn' => 'nullable|string',
			'AddedBy' => 'nullable|string',
			'LastUpdatedOn' => 'nullable|date',
			'LastUpdatedBy' => 'nullable|date',
			'DeletedOn' => 'nullable|string',
			'DeletedBy' => 'nullable|string',
			'IsActive' => 'nullable|string',
			'rowguid' => 'nullable|string|max:255',
        ];
    }
}