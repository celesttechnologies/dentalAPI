<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to false if you want authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'date' => 'nullable|date_format:Y-m-d', // Date should be in YYYY-MM-DD format
            'period' => 'nullable|in:day,week,month', // Only allow day, week, or month
            'doctor_id' => 'nullable|integer|exists:users,id', // Check if the doctor exists
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages()
    {
        return [
            'date.date_format' => 'The date must be in YYYY-MM-DD format.',
            'period.in' => 'The period must be one of: day, week, or month.',
            'doctor_id.exists' => 'The selected doctor does not exist.',
        ];
    }
}
