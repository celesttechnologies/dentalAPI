<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'MedicalHistoryID' => 'required|string|max:255',
            'PatientID'        => 'required|string|max:255',
            'HistoryDetails'   => 'required|string',
            'CreatedOn'        => 'nullable|date',
            'CreatedBy'        => 'nullable|string|max:255',
            'LastUpdatedOn'    => 'nullable|date',
            'LastUpdatedBy'    => 'nullable|string|max:255',
        ];
    }
}