<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreatmentDoctorPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'TreatmentDoneId' => 'sometimes|string|max:255',
			'ProviderId' => 'sometimes|string|max:255',
			'Amount' => 'sometimes|numeric',
			'rowguid' => 'sometimes|string|max:255',
			'AddedOn' => 'sometimes|string',
			'AddedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
        ];
    }
}