<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicLabSupplierRequest extends FormRequest
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
			'EmailAddress1' => 'required|email|max:255',
			'EmailAddress2' => 'required|email|max:255',
			'Notes' => 'required|string',
			'Address1' => 'required|string',
			'Address2' => 'required|string',
			'IsEmailLabOrderActive' => 'required|email|max:255',
			'IsActive' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'rowguid' => 'required|string|max:255',
        ];
    }
}