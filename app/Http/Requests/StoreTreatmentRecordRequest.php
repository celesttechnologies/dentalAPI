<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentRecordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'RecordID'    => 'required|string|max:255',
            'PatientID'   => 'required|string|max:255',
            'TreatmentID' => 'required|string|max:255',
            'Notes'       => 'nullable|string',
            'RecordedOn'  => 'required|date',
        ];
    }
}