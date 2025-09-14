<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'BankAccountID' => 'required|string|max:255',
            'ClientID'      => 'required|string|max:255',
            'AccountNumber' => 'required|string|max:100',
            'BankName'      => 'required|string|max:255',
            'OpeningBalance'=> 'required|numeric',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}