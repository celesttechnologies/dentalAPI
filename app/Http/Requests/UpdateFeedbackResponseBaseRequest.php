<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackResponseBaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'FeedbackID' => 'sometimes|string|max:255',
			'QuestionID' => 'sometimes|string|max:255',
			'QuestionTypeID' => 'sometimes|string|max:255',
			'ResponseValue' => 'sometimes|string',
			'ResponseDescription' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'UpdatedBy' => 'sometimes|date',
			'UpdatedOn' => 'sometimes|date',
        ];
    }
}