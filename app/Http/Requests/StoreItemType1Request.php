<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemType1Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ItemTypeID' => 'required|integer',
            'Name'       => 'required|string|max:255',
            'AddedBy'    => 'nullable|string|max:255',
            'AddedOn'    => 'required|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
        ];
    }
}