<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLookUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'id'             => 'sometimes|string|max:255',
            'ClinicID'       => 'sometimes|string|max:255',
            'ItemID'         => 'sometimes|integer',
            'ItemTitle'      => 'sometimes|string|max:255',
            'ItemDescription'=> 'nullable|string',
            'ItemCategory'   => 'sometimes|string|max:255',
            'IsDeleted'      => 'nullable|boolean',
            'Importance'     => 'sometimes|integer',
            'LastUpdatedBy'  => 'sometimes|string|max:255',
            'LastUpdatedOn'  => 'sometimes|date',
            'rowguid'        => 'nullable|string|max:255',
        ];
    }
}