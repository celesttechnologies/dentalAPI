<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'patient_id' => 'sometimes|integer|exists:patients,id',
            'doctor_id' => 'sometimes|integer|exists:doctors,id',
            'appointment_date' => 'sometimes|date',
            'status' => 'nullable|string|max:255',
        ];
    }
}