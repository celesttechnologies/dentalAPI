<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NotificationID' => 'sometimes|string|max:255',
            'UserID'         => 'sometimes|string|max:255',
            'Message'        => 'sometimes|string',
            'IsRead'         => 'sometimes|boolean',
            'NotifiedOn'     => 'sometimes|date',
            'CreatedOn'      => 'nullable|date',
            'CreatedBy'      => 'nullable|string|max:255',
        ];
    }
}