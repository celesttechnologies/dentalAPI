<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patient_id' => 'required|integer|exists:patients,id',
            'amount' => 'required|numeric',
            'status' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
        ];
    }
}