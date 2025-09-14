<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
      
    public function rules()
    {
        return [
            'PurchaseID'   => 'nullable|string|max:255',
            'VendorID'     => 'nullable|string|max:255',
            'TotalAmount'  => 'nullable|numeric',
            'PurchaseDate' => 'nullable|date',
            'Remarks'      => 'nullable|string'
        ];
    }
}