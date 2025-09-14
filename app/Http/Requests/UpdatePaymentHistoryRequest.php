<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PaymentHistoryID' => 'sometimes|string|max:255',
            'InvoiceID'        => 'sometimes|string|max:255',
            'PaymentAmount'    => 'sometimes|numeric',
            'PaymentDate'      => 'sometimes|date',
            'PaymentMethod'    => 'sometimes|string|max:100',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
        ];
    }
}