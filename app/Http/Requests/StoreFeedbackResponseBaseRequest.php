<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackResponseBaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'FeedbackID' => 'required|string|max:255',
			'QuestionID' => 'required|string|max:255',
			'QuestionTypeID' => 'required|string|max:255',
			'ResponseValue' => 'required|string',
			'ResponseDescription' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedOn' => 'required|string',
			'UpdatedBy' => 'required|date',
			'UpdatedOn' => 'required|date',
        ];
    }
}