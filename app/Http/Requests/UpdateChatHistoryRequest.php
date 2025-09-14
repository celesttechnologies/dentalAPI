<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChatID'  => 'sometimes|string|max:255',
            'UserID'  => 'sometimes|string|max:255',
            'Message' => 'sometimes|string',
            'SentOn'  => 'sometimes|date',
        ];
    }
}