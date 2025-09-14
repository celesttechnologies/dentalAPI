<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLookUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'id'             => 'required|string|max:255',
            'ClinicID'       => 'nullable|string|max:255',
            'ItemID'         => 'required|integer',
            'ItemTitle'      => 'required|string|max:255',
            'ItemDescription'=> 'nullable|string',
            'ItemCategory'   => 'required|string|max:255',
            'IsDeleted'      => 'nullable|boolean',
            'Importance'     => 'required|integer',
            'LastUpdatedBy'  => 'required|string|max:255',
            'LastUpdatedOn'  => 'required|date',
            'rowguid'        => 'nullable|string|max:255',
        ];
    }
}