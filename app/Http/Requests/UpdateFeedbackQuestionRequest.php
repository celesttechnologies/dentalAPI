<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'Question' => 'sometimes|string',
			'QuestionType' => 'sometimes|string',
			'QuestionTypeDescription' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'CreatedDate' => 'sometimes|date',
			'UpdatedBy' => 'sometimes|date',
			'UpdatedDate' => 'sometimes|date',
			'IsDeleted' => 'sometimes|string',
        ];
    }
}