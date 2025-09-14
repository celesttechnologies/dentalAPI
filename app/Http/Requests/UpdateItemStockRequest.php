<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemStockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ItemId' => 'sometimes|string|max:255',
			'Quantity' => 'sometimes|string',
        ];
    }
}