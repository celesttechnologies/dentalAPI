<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientReceiptsDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ReceiptID' => 'required|string|max:255',
			'InvoiceID' => 'required|string|max:255',
			'PatientTreatmentDoneID' => 'required|string|max:255',
			'AmountPaid' => 'required|numeric',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}