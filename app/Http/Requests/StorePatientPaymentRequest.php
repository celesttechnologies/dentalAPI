<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PaymentID'   => 'required|string|max:255',
            'PatientID'   => 'required|string|max:255',
            'InvoiceID'   => 'required|string|max:255',
            'AmountPaid'  => 'required|numeric',
            'PaidOn'      => 'required|date',
            'PaymentMode' => 'nullable|string|max:100'
        ];
    }
}