<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientInvoicesDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'InvoiceID' => 'required|string|max:255',
			'PatientTreatmentDoneID' => 'required|string|max:255',
			'TreatmentDate' => 'required|date',
			'TreatmentSummary' => 'required|string',
			'TreatmentCost' => 'required|numeric',
			'TreatmentAddition' => 'required|string',
			'TreatmentDiscount' => 'required|string',
			'TreatmentTax' => 'required|string',
			'TreatmentTotalCost' => 'required|numeric',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}