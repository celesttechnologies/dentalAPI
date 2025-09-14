<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'Question' => 'required|string',
			'QuestionType' => 'required|string',
			'QuestionTypeDescription' => 'required|string',
			'CreatedBy' => 'required|string',
			'CreatedDate' => 'required|date',
			'UpdatedBy' => 'required|date',
			'UpdatedDate' => 'required|date',
			'IsDeleted' => 'required|string',
        ];
    }
}