<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemType1Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ItemTypeID' => 'sometimes|integer',
            'Name'       => 'sometimes|string|max:255',
            'AddedBy'    => 'nullable|string|max:255',
            'AddedOn'    => 'sometimes|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
        ];
    }
}