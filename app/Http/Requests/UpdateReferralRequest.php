<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferralRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ReferralID'       => 'sometimes|string|max:255',
            'PatientID'        => 'sometimes|string|max:255',
            'ReferringDoctorID'=> 'sometimes|string|max:255',
            'ReferredDoctorID' => 'sometimes|string|max:255',
            'ReferralDate'     => 'sometimes|date',
            'Notes'            => 'nullable|string',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
        ];
    }
}