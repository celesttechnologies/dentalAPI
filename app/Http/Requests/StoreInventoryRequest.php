<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'InventoryID'  => 'required|string|max:255',
            'ItemName'     => 'required|string|max:255',
            'Quantity'     => 'required|integer',
            'UnitPrice'    => 'required|numeric',
            'ReorderLevel' => 'nullable|integer',
            'CreatedOn'    => 'nullable|date'
        ];
    }
}