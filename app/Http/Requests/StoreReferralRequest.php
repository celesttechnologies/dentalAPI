<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReferralRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ReferralID'       => 'required|string|max:255',
            'PatientID'        => 'required|string|max:255',
            'ReferringDoctorID'=> 'required|string|max:255',
            'ReferredDoctorID' => 'required|string|max:255',
            'ReferralDate'     => 'required|date',
            'Notes'            => 'nullable|string',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
        ];
    }
}