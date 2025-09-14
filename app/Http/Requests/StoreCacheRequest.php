<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCacheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CacheKey'   => 'required|string|max:255',
            'CacheValue' => 'required|string',
            'Expiry'     => 'required|date',
        ];
    }
}