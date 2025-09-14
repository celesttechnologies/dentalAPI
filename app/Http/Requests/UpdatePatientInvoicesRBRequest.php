<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientInvoicesRBRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'InvoiceDetailID' => 'sometimes|string|max:255',
			'InvoiceID' => 'sometimes|string|max:255',
			'PatientTreatmentDoneID' => 'sometimes|string|max:255',
			'TreatmentDate' => 'sometimes|date',
			'TreatmentSummary' => 'sometimes|string',
			'TreatmentCost' => 'sometimes|numeric',
			'TreatmentAddition' => 'sometimes|string',
			'TreatmentDiscount' => 'sometimes|string',
			'TreatmentTax' => 'sometimes|string',
			'TreatmentTotalCost' => 'sometimes|numeric',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}