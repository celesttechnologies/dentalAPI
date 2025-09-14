<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankDepositRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DepositID'     => 'required|string|max:255',
            'BankAccountID' => 'required|string|max:255',
            'Amount'        => 'required|numeric',
            'DepositDate'   => 'required|date',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}