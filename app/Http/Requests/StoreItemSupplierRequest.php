<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'SupplierName' => 'required|string',
			'RegistrationNo' => 'required|string',
			'ContactPerson' => 'required|string',
			'Notes' => 'required|string',
			'Street1' => 'required|string',
			'Street2' => 'required|string',
			'City' => 'required|string',
			'State' => 'required|string',
			'Country' => 'required|string',
			'Postcode' => 'required|string',
			'ISD' => 'required|string',
			'STD' => 'required|string',
			'Phone' => 'required|string',
			'PermanentAddress' => 'required|string',
			'AddedOn' => 'required|string',
			'AddedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'DeletedOn' => 'required|string',
			'DeletedBy' => 'required|string',
			'IsActive' => 'required|string',
			'rowguid' => 'required|string|max:255',
        ];
    }
}