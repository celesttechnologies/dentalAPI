<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEcgActivityEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'EventActivityID'    => 'sometimes|string|max:255',
            'ClinicID'           => 'sometimes|string|max:255',
            'PatientID'          => 'sometimes|string|max:255',
            'EventTypeID'        => 'sometimes|integer',
            'EventRelatedID'     => 'nullable|string|max:255',
            'EventTypeName'      => 'nullable|string|max:255',
            'EventDetails'       => 'nullable|string',
            'DeviceTypeID'       => 'nullable|string|max:255',
            'IpAddress'          => 'nullable|string|max:255',
            'Isdeleted'          => 'nullable|boolean',
            'CreatedOn'          => 'nullable|date',
            'CreatedBy'          => 'nullable|string|max:255',
            'LastUpdatedOn'      => 'nullable|date',
            'LastUpdatedBy'      => 'nullable|string|max:255',
            'EventRelatedFileId' => 'nullable|integer',
        ];
    }
}