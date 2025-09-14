<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PurchaseOrderHeaderId' => 'nullable|string|max:255',
			'ItemID' => 'nullable|string|max:255',
			'Qty' => 'nullable|string',
			'Rate' => 'nullable|string',
			'Amount' => 'nullable|numeric',
			'ManufacturingDate' => 'nullable|date',
			'ExpiryDate' => 'nullable|date',
			'BatchNumber' => 'nullable|string',
			'BatchDate' => 'nullable|date',
        ];
    }
}