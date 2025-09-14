<?php

namespace App\Services;

use App\Models\FeedbackResponseBase;
use App\Http\Resources\FeedbackResponseBaseResource;

class FeedbackResponseBaseService
{
    /**
     * Get a paginated list of Feedback Responses.
     *
     * @param int $perPage
     * @return array
     */
    public function getFeedbackResponses(int $perPage): array
    {
        $data = FeedbackResponseBase::paginate($perPage);

        return [
            'responses' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createResponseBase(array $data): FeedbackResponseBase
    {
        return FeedbackResponseBase::create($data);
    }

    public function updateResponseBase(FeedbackResponseBase $feedbackRB, array $data): FeedbackResponseBase
    {
        $feedbackRB->update($data);
        $feedbackRB->fresh();
        
        return $feedbackRB;
    }
}
