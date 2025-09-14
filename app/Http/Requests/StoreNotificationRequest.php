<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NotificationID' => 'required|string|max:255',
            'UserID'         => 'required|string|max:255',
            'Message'        => 'required|string',
            'IsRead'         => 'required|boolean',
            'NotifiedOn'     => 'required|date',
            'CreatedOn'      => 'nullable|date',
            'CreatedBy'      => 'nullable|string|max:255',
        ];
    }
}