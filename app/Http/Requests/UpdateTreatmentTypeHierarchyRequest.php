<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreatmentTypeHierarchyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'TreatmentTypeID'         => 'sometimes|string|max:255',
            'ClinicID'                => 'sometimes|string|max:255',
            'Title'                   => 'sometimes|string|max:255',
            'Description'             => 'nullable|string',
            'ParentTreatmentTypeID'   => 'nullable|string|max:255',
            'IsDeleted'               => 'nullable|boolean',
            'CreatedOn'               => 'sometimes|date',
            'CreatedBy'               => 'sometimes|string|max:255',
            'LastUpdatedOn'           => 'nullable|date',
            'LastUpdatedBy'           => 'nullable|string|max:255',
            'rowguid'                 => 'nullable|string|max:255',
            'GeneralTreatmentCost'    => 'nullable|numeric',
            'SpecialistTreatmentCost' => 'nullable|numeric',
            'TreatmentSpecialityTypeID' => 'nullable|integer',
        ];
    }
}