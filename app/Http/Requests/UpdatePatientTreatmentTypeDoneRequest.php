<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientTreatmentTypeDoneRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'PatientTreatmentTypeDoneID' => 'sometimes|string|max:255',
            'PatientTreatmentDoneID'     => 'sometimes|string|max:255',
            'TreatmentTypeID'            => 'sometimes|string|max:255',
            'TreatmentSubTypeID'         => 'nullable|string|max:255',
            'TeethTreatment'             => 'nullable|string',
            'TeethTreatmentNote'         => 'nullable|string',
            'TreatmentCost'              => 'nullable|numeric',
            'Discount'                   => 'nullable|numeric',
            'IsDeleted'                  => 'nullable|boolean',
            'IsExpanded'                 => 'nullable|boolean',
            'TreatmentTotalCost'         => 'nullable|numeric',
            'TreatmentTax'               => 'nullable|numeric',
            'Addition'                   => 'nullable|numeric',
            'AmountToBeCollected'        => 'nullable|numeric',
        ];
    }
}