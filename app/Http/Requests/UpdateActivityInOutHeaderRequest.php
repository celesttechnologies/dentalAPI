<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityInOutHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'HeaderID'     => 'sometimes|string|max:255',
            'UserID'       => 'sometimes|string|max:255',
            'ActivityDate' => 'sometimes|date',
            'Remarks'      => 'nullable|string',
            'CreatedOn'    => 'nullable|date',
            'CreatedBy'    => 'nullable|string|max:255',
        ];
    }
}