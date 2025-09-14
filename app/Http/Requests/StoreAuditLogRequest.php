<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuditLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'LogID'       => 'required|string|max:255',
            'UserID'      => 'required|string|max:255',
            'Action'      => 'required|string|max:255',
            'Description' => 'nullable|string',
            'CreatedOn'   => 'required|date',
        ];
    }
}