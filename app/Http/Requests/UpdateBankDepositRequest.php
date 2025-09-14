<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankDepositRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'DepositID'     => 'sometimes|string|max:255',
            'BankAccountID' => 'sometimes|string|max:255',
            'Amount'        => 'sometimes|numeric',
            'DepositDate'   => 'sometimes|date',
            'CreatedOn'     => 'nullable|date',
            'CreatedBy'     => 'nullable|string|max:255',
        ];
    }
}