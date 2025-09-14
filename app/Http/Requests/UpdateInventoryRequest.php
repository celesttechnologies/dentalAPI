<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'InventoryID'  => 'sometimes|string|max:255',
            'ItemName'     => 'sometimes|string|max:255',
            'Quantity'     => 'sometimes|integer',
            'UnitPrice'    => 'sometimes|numeric',
            'ReorderLevel' => 'nullable|integer',
            'CreatedOn'    => 'nullable|date'
        ];
    }
}