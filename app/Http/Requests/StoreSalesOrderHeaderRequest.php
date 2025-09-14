<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesOrderHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'SalesOrderNo' => 'required|string',
			'SalesOrderDate' => 'required|date',
			'ItemCustomerID' => 'required|string|max:255',
			'InvoiceNo' => 'required|string',
			'InvoiceDate' => 'required|date',
			'Naration' => 'required|string',
			'DespatchDate' => 'required|date',
			'Total' => 'required|string',
			'Tax' => 'required|string',
			'OtherExp' => 'required|string',
			'Discount' => 'required|string',
			'GrandTotal' => 'required|string',
			'PaidAmt' => 'required|string|max:255',
			'BalanceAmt' => 'required|string',
        ];
    }
}