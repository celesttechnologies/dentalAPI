<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ItemTypeID'      => 'required|string|max:255',
            'ClinicID'        => 'nullable|string|max:255',
            'Title'           => 'required|string|max:255',
            'Description'     => 'nullable|string',
            'ParentItemTypeID'=> 'nullable|string|max:255',
            'IsDeleted'       => 'nullable|boolean',
            'CreatedOn'       => 'required|date',
            'CreatedBy'       => 'required|string|max:255',
            'LastUpdatedOn'   => 'nullable|date',
            'LastUpdatedBy'   => 'nullable|string|max:255',
            'rowguid'         => 'nullable|string|max:255',
        ];
    }
}