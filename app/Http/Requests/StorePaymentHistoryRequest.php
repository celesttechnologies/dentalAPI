<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PaymentHistoryID' => 'required|string|max:255',
            'InvoiceID'        => 'required|string|max:255',
            'PaymentAmount'    => 'required|numeric',
            'PaymentDate'      => 'required|date',
            'PaymentMethod'    => 'required|string|max:100',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
        ];
    }
}