<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicalHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'MedicalHistoryID' => 'sometimes|string|max:255',
            'PatientID'        => 'sometimes|string|max:255',
            'HistoryDetails'   => 'sometimes|string',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
            'LastUpdatedOn'    => 'nullable|date',
            'LastUpdatedBy'    => 'nullable|string|max:255',
        ];
    }
}