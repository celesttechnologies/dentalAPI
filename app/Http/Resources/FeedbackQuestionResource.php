<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->Id,
            'question' => $this->Question,
            'question_type' => $this->QuestionType,
            'question_type_description' => $this->QuestionTypeDescription,
            'created_by' => $this->CreatedBy,
            'created_date' => $this->CreatedDate,
            'updated_by' => $this->UpdatedBy,
            'updated_date' => $this->UpdatedDate,
            'is_deleted' => $this->IsDeleted,
        ];
    }
}