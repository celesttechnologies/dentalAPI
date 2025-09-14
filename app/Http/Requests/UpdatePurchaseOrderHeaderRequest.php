<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOrderHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'PurchaseOrderNo' => 'nullable|string',
			'PurchaseOrderDate' => 'nullable|date',
			'ItemSupplierID' => 'nullable|string|max:255',
			'InvoiceNo' => 'nullable|string',
			'InvoiceDate' => 'nullable|date',
			'Naration' => 'nullable|string',
			'ArrivalDate' => 'nullable|date',
			'Total' => 'nullable|string',
			'Tax' => 'nullable|string',
			'OtherExp' => 'nullable|string',
			'Discount' => 'nullable|string',
			'GrandTotal' => 'nullable|string',
			'PaidAmt' => 'nullable|string|max:255',
			'BalanceAmt' => 'nullable|string',
			'IsDeleted' => 'nullable|string',
        ];
    }
}