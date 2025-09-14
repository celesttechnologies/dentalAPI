<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'BankAccountID' => 'sometimes|string|max:255',
            'ClientID'      => 'sometimes|string|max:255',
            'AccountNumber' => 'sometimes|string|max:100',
            'BankName'      => 'sometimes|string|max:255',
            'OpeningBalance'=> 'sometimes|numeric',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}