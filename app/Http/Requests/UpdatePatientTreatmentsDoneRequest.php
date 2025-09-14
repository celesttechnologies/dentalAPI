<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTreatmentsDoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PatientID' => 'nullable|string|max:255',
			'ProviderID' => 'nullable|string|max:255',
			'TreatmentCost' => 'nullable|numeric',
			'TreatmentDiscount' => 'nullable|string',
			'TreatmentTax' => 'nullable|string',
			'TreatmentTotalCost' => 'nullable|numeric',
			'TreatmentPayment' => 'nullable|string',
			'TreatmentBalance' => 'nullable|string',
			'ModeofPayment' => 'nullable|string',
			'ChequeNo' => 'nullable|string',
			'ChequeDate' => 'nullable|date',
			'BankName' => 'nullable|string',
			'CreditCardBankID' => 'nullable|string|max:255',
			'CreditCardDigit' => 'nullable|string',
			'CreditCardOwner' => 'nullable|string',
			'CreditCardValidFrom' => 'nullable|string|max:255',
			'CreditCardValidTo' => 'nullable|string|max:255',
			'TreatmentDate' => 'nullable|date',
			'ProviderInchargeID' => 'nullable|string|max:255',
			'IsDeleted' => 'nullable|string',
			'AddedBy' => 'nullable|string',
			'AddedOn' => 'nullable|string',
			'LastUpdatedBy' => 'nullable|date',
			'LastUpdatedOn' => 'nullable|date',
			'rowguid' => 'nullable|string|max:255',
			'ReceiptDate' => 'nullable|date',
			'ReceiptNo' => 'nullable|string',
			'IsArchived' => 'nullable|string',
			'ParentPatientTreatmentDoneID' => 'nullable|string|max:255',
			'TreatmentAddition' => 'nullable|string',
			'WaitingAreaID' => 'nullable|string|max:255',
			'AmountToBeCollected' => 'nullable|numeric',
			'TeethTreatmentNote' => 'nullable|string',
			'ArchivedOn' => 'nullable|string',
			'isPrimaryTooth' => 'nullable|boolean',
			'IsCompleted' => 'nullable|boolean',
			'CompletionTime' => 'nullable|string',
        ];
    }
}