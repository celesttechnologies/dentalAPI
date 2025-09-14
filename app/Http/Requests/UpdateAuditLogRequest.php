<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuditLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'LogID'       => 'sometimes|string|max:255',
            'UserID'      => 'sometimes|string|max:255',
            'Action'      => 'sometimes|string|max:255',
            'Description' => 'nullable|string',
            'CreatedOn'   => 'sometimes|date',
        ];
    }
}