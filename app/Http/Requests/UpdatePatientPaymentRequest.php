<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PaymentID'   => 'sometimes|string|max:255',
            'PatientID'   => 'sometimes|string|max:255',
            'InvoiceID'   => 'sometimes|string|max:255',
            'AmountPaid'  => 'sometimes|numeric',
            'PaidOn'      => 'sometimes|date',
            'PaymentMode' => 'nullable|string|max:100'
        ];
    }
}