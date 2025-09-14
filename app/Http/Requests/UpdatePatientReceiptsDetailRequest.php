<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientReceiptsDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ReceiptID' => 'sometimes|string|max:255',
			'InvoiceID' => 'sometimes|string|max:255',
			'PatientTreatmentDoneID' => 'sometimes|string|max:255',
			'AmountPaid' => 'sometimes|numeric',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}