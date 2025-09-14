<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientReceiptRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ReceiptNo' => 'sometimes|string',
			'ReceiptNumber' => 'sometimes|string',
			'ManualReceiptNo' => 'sometimes|string',
			'ReceiptCodePrefix' => 'sometimes|string',
			'InvoiceID' => 'sometimes|string|max:255',
			'ReceiptDate' => 'sometimes|date',
			'PatientID' => 'sometimes|string|max:255',
			'PatientTreatmentDoneId' => 'sometimes|string|max:255',
			'TreatmentPayment' => 'sometimes|string',
			'InvoicedAmount' => 'sometimes|numeric',
			'BalanceAmount' => 'sometimes|numeric',
			'ModeofPayment' => 'sometimes|string',
			'ChequeNo' => 'sometimes|string',
			'ChequeDate' => 'sometimes|date',
			'BankName' => 'sometimes|string',
			'CreditCardBankID' => 'sometimes|string|max:255',
			'CreditCardDigit' => 'sometimes|string',
			'CreditCardOwner' => 'sometimes|string',
			'CreditCardValidFrom' => 'sometimes|string|max:255',
			'CreditCardValidTo' => 'sometimes|string|max:255',
			'PaymentNotes' => 'sometimes|string',
			'IsCancelled' => 'sometimes|string',
			'CancellationNotes' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'rowguid' => 'sometimes|string|max:255',
			'WaitingAreaID' => 'sometimes|string|max:255',
			'InsuranceName' => 'sometimes|string',
			'PolicyNumber' => 'sometimes|string',
			'PolicyNotes' => 'sometimes|string',
			'ReceiptNotes' => 'sometimes|string',
        ];
    }
}