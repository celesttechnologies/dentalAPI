<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesOrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SalesOrderHeaderId' => 'required|string|max:255',
			'ItemID' => 'required|string|max:255',
			'Qty' => 'required|string',
			'Rate' => 'required|string',
			'Amount' => 'required|numeric',
			'ManufacturingDate' => 'required|date',
			'ExpiryDate' => 'required|date',
			'BatchNumber' => 'required|string',
			'BatchDate' => 'required|date',
        ];
    }
}