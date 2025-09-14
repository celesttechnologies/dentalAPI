<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCacheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
  
    public function rules()
    {
        return [
            'CacheKey'   => 'sometimes|string|max:255',
            'CacheValue' => 'sometimes|string',
            'Expiry'     => 'sometimes|date',
        ];
    }
}