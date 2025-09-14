<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentPlanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'TreatmentPlanID' => 'required|string|max:255',
            'PatientID'       => 'required|string|max:255',
            'PlanDetails'     => 'required|string',
            'StartDate'       => 'required|date',
            'EndDate'         => 'nullable|date',
            'CreatedOn'       => 'nullable|date',
            'CreatedBy'       => 'nullable|string|max:255',
        ];
    }
}