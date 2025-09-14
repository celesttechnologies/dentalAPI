<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'InvoiceID'   => 'sometimes|string|max:255',
            'PatientID'   => 'sometimes|string|max:255',
            'Amount'      => 'sometimes|numeric',
            'IssuedOn'    => 'sometimes|date',
            'DueDate'     => 'nullable|date',
            'Status'      => 'nullable|string|max:100'
        ];
    }
}