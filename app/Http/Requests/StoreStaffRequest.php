<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'StaffID'   => 'required|string|max:255',
            'Name'      => 'required|string|max:255',
            'Email'     => 'required|email',
            'Phone'     => 'nullable|string|max:15',
            'Position'  => 'required|string|max:255',
            'JoinedOn'  => 'required|date',
            'CreatedOn' => 'nullable|date',
            'CreatedBy' => 'nullable|string|max:255',
        ];
    }
}