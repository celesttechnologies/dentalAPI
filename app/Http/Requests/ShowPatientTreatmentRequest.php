<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowPatientTreatmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change to authorization logic if needed
    }

    public function rules(): array
    {
        return [
            'status' => 'nullable|string|in:ongoing,completed,all', // Allow only these values
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => 'The status must be one of: ongoing, completed, or all.',
        ];
    }
}