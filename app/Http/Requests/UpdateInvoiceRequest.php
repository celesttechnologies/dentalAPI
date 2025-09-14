<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patient_id' => 'sometimes|integer|exists:patients,id',
            'amount' => 'sometimes|numeric',
            'status' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
        ];
    }
}