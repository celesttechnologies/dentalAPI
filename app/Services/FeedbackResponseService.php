<?php

namespace App\Services;

use App\Models\FeedbackResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\FeedbackResponseResource;

class FeedbackResponseService
{
    /**
     * Get a paginated list of Feedback Responses.
     *
     * @param int $perPage
     * @return array
     */
    public function getFeedbackResponses(int $perPage): array
    {
        $data = FeedbackResponse::paginate($perPage);

        return [
            'responses' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new feedback response record.
     *
     * @param array $data The validated data for creating the feedback response
     * @return FeedbackResponse The newly created feedback response model
     */
    public function createResponse(array $data): FeedbackResponse
    {
        return FeedbackResponse::create($data);
    }

    /**
     * Update an existing feedback response record.
     *
     * @param FeedbackResponse $feedbackResponse The feedback response model to update
     * @param array $data The validated data for updating the feedback response
     * @return FeedbackResponse The updated feedback response model
     */
    public function updateResponse(FeedbackResponse $feedbackResponse, array $data): FeedbackResponse
    {
        $feedbackResponse->update($data);
        return $feedbackResponse;
    }
}