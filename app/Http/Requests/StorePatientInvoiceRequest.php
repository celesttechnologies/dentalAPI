<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'InvoiceID'   => 'required|string|max:255',
            'PatientID'   => 'required|string|max:255',
            'Amount'      => 'required|numeric',
            'IssuedOn'    => 'required|date',
            'DueDate'     => 'nullable|date',
            'Status'      => 'nullable|string|max:100'
        ];
    }
}