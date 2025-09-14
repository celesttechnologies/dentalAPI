<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreatmentPlanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'TreatmentPlanID' => 'sometimes|string|max:255',
            'PatientID'       => 'sometimes|string|max:255',
            'PlanDetails'     => 'sometimes|string',
            'StartDate'       => 'sometimes|date',
            'EndDate'         => 'nullable|date',
            'CreatedOn'       => 'nullable|date',
            'CreatedBy'       => 'nullable|string|max:255',
        ];
    }
}