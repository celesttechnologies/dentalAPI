<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreatmentRecordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'RecordID'    => 'sometimes|string|max:255',
            'PatientID'   => 'sometimes|string|max:255',
            'TreatmentID' => 'sometimes|string|max:255',
            'Notes'       => 'nullable|string',
            'RecordedOn'  => 'sometimes|date',
        ];
    }
}