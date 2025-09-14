<?php

namespace App\Services;

use App\Models\FeedbackQuestion;
use App\Http\Resources\FeedbackQuestionResource;

class FeedbackQuestionService
{
    /**
     * Get a paginated list of Feedback Questions.
     *
     * @param int $perPage
     * @return array
     */
    public function getFeedbackQuestions(int $perPage): array
    {
        $data = FeedbackQuestion::paginate($perPage);

        return [
            'questions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createQuestion(array $data): FeedbackQuestion
    {
        return FeedbackQuestion::create($data);
    }

    public function updateQuestion(FeedbackQuestion $feedbackQuestion, array $data): FeedbackQuestion
    {
        $feedbackQuestion->update($data);
        $feedbackQuestion->fresh();

        return $feedbackQuestion;
    }
}