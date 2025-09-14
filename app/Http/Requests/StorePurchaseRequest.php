<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'PurchaseID'   => 'required|string|max:255',
            'VendorID'     => 'required|string|max:255',
            'TotalAmount'  => 'required|numeric',
            'PurchaseDate' => 'required|date',
            'Remarks'      => 'nullable|string'
        ];
    }
}