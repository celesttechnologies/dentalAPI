<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicLabSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'SupplierName' => 'sometimes|string',
			'RegistrationNo' => 'sometimes|string',
			'ContactPerson' => 'sometimes|string',
			'EmailAddress1' => 'sometimes|email|max:255',
			'EmailAddress2' => 'sometimes|email|max:255',
			'Notes' => 'sometimes|string',
			'Address1' => 'sometimes|string',
			'Address2' => 'sometimes|string',
			'IsEmailLabOrderActive' => 'sometimes|email|max:255',
			'IsActive' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
        ];
    }
}