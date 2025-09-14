<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemsHierarchyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ItemTypeID'    => 'sometimes|string|max:255',
            'Title'         => 'sometimes|string|max:255',
            'Description'   => 'nullable|string',
            'ParentItemTypeID' => 'nullable|string|max:255',
            'IsDeleted'     => 'nullable|boolean',
            'CreatedOn'     => 'sometimes|date',
            'CreatedBy'     => 'sometimes|string|max:255',
            'LastUpdatedOn' => 'nullable|date',
            'LastUpdatedBy' => 'nullable|string|max:255',
            'rowguid'       => 'nullable|string|max:255',
        ];
    }
}