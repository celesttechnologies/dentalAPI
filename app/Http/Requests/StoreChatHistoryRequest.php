<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'ChatID'  => 'required|string|max:255',
            'UserID'  => 'required|string|max:255',
            'Message' => 'required|string',
            'SentOn'  => 'required|date',
        ];
    }
}