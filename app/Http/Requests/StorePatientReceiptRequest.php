<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientReceiptRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ReceiptNo' => 'required|string',
			'ReceiptNumber' => 'required|string',
			'ManualReceiptNo' => 'nullable|string',
			'ReceiptCodePrefix' => 'required|string',
			'InvoiceID' => 'required|string|max:255',
			'ReceiptDate' => 'required|date',
			'PatientID' => 'required|string|max:255',
			'ModeofPayment' => 'required|string',
			'ChequeNo' => 'nullable|string',
			'ChequeDate' => 'nullable|date',
			'BankName' => 'nullable|string',
			'CreditCardBankID' => 'nullable|string|max:255',
			'CreditCardDigit' => 'nullable|string',
			'CreditCardOwner' => 'nullable|string',
			'CreditCardValidFrom' => 'nullable|string|max:255',
			'CreditCardValidTo' => 'nullable|string|max:255',
			'PaymentNotes' => 'required|string',
			'InsuranceName' => 'nullable|string',
			'PolicyNumber' => 'nullable|string',
			'PolicyNotes' => 'nullable|string',
			'ReceiptNotes' => 'nullable|string',
        ];
    }
}