<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'StaffID'   => 'sometimes|string|max:255',
            'Name'      => 'sometimes|string|max:255',
            'Email'     => 'sometimes|email',
            'Phone'     => 'nullable|string|max:15',
            'Position'  => 'sometimes|string|max:255',
            'JoinedOn'  => 'sometimes|date',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}