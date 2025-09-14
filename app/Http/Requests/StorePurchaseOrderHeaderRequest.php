<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PurchaseOrderNo' => 'required|string',
			'PurchaseOrderDate' => 'required|date',
			'ItemSupplierID' => 'required|string|max:255',
			'InvoiceNo' => 'required|string',
			'InvoiceDate' => 'required|date',
			'Naration' => 'required|string',
			'ArrivalDate' => 'required|date',
			'Total' => 'required|string',
			'Tax' => 'required|string',
			'OtherExp' => 'required|string',
			'Discount' => 'required|string',
			'GrandTotal' => 'required|string',
			'PaidAmt' => 'required|string|max:255',
			'BalanceAmt' => 'required|string'
        ];
    }
}