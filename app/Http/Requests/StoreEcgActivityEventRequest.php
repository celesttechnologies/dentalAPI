<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcgActivityEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'EventActivityID'    => 'required|string|max:255',
            'ClinicID'           => 'nullable|string|max:255',
            'PatientID'          => 'nullable|string|max:255',
            'EventTypeID'        => 'required|integer',
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