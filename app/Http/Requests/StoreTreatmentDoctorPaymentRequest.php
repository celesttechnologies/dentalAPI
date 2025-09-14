<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentDoctorPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'TreatmentDoneId' => 'required|string|max:255',
			'ProviderId' => 'required|string|max:255',
			'Amount' => 'required|numeric',
			'rowguid' => 'required|string|max:255',
			'AddedOn' => 'required|string',
			'AddedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'IsDeleted' => 'required|string',
        ];
    }
}