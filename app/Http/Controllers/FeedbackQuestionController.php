<?php

namespace App\Http\Controllers;

use App\Models\FeedbackQuestion;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\FeedbackQuestionService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\FeedbackQuestionResource;
use App\Http\Requests\StoreFeedbackQuestionRequest;
use App\Http\Requests\UpdateFeedbackQuestionRequest;

class FeedbackQuestionController extends Controller
{
    use ApiResponse;

    public function __construct(private FeedbackQuestionService $questionService)
    {
    }

    /**
     * @group FeedbackQuestion
     *
     * @method GET
     *
     * List all feedbackquestion
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "feedback_questions": [
     *                 {
     *                     "id": 1,
     *                     "question": "Example value",
     *                     "question_type": "Example value",
     *                     "question_type_description": "Example value",
     *                     "created_by": "Example value",
     *                     "created_date": "Example value",
     *                     "updated_by": "Example value",
     *                     "updated_date": "Example value",
     *                     "is_deleted": true
     *                 }
     *             ],
     *             "pagination": {
     *                 "current_page": 1,
     *                 "per_pages": 50,
     *                 "total": 100
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->questionService->getFeedbackQuestions($perPage);

            return $this->successResponse([
                'feedback_questions' => FeedbackQuestionResource::collection($data['questions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Feedback Questions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group FeedbackQuestion
     *
     * @method GET
     *
     * Create feedbackquestion
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "question": {
     *                 "id": 1,
     *                 "question": "Example value",
     *                 "question_type": "Example value",
     *                 "question_type_description": "Example value",
     *                 "created_by": "Example value",
     *                 "created_date": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_date": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackQuestionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group FeedbackQuestion
     *
     * @method POST
     *
     * Create a new feedbackquestion
     *
     * @post /
     *
     * @bodyParam Question string required. Example: "Example Question"
     * @bodyParam QuestionType string required. Example: "Example QuestionType"
     * @bodyParam QuestionTypeDescription string required. Example: "Example QuestionTypeDescription"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedDate string required. date. Example: "Example CreatedDate"
     * @bodyParam UpdatedBy string required. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedDate string required. date. Example: "Example UpdatedDate"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "question": {
     *                 "id": 1,
     *                 "question": "Example value",
     *                 "question_type": "Example value",
     *                 "question_type_description": "Example value",
     *                 "created_by": "Example value",
     *                 "created_date": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_date": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackQuestionResource
     */
    public function store(StoreFeedbackQuestionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $question = $this->questionService->createQuestion($validatedData);

            return $this->successResponse([
                'message' => 'Feedback question created successfully',
                'question' => new FeedbackQuestionResource($question)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating feedback question: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create feedback question',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackQuestion
     *
     * @method GET
     *
     * Get a specific feedbackquestion
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the feedbackquestion to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "question": {
     *                 "id": 1,
     *                 "question": "Example value",
     *                 "question_type": "Example value",
     *                 "question_type_description": "Example value",
     *                 "created_by": "Example value",
     *                 "created_date": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_date": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackQuestionResource
     */
    public function show(FeedbackQuestion $feedbackQuestion)
    {
        //
    }

    /**
     * @group FeedbackQuestion
     *
     * @method GET
     *
     * Edit feedbackquestion
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the feedbackquestion to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "question": {
     *                 "id": 1,
     *                 "question": "Example value",
     *                 "question_type": "Example value",
     *                 "question_type_description": "Example value",
     *                 "created_by": "Example value",
     *                 "created_date": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_date": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackQuestionResource
     */
    public function edit(FeedbackQuestion $feedbackQuestion)
    {
        //
    }

    /**
     * @group FeedbackQuestion
     *
     * @method PUT
     *
     * Update an existing feedbackquestion
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the feedbackquestion to update. Example: 1
     *
     * @bodyParam Question string optional. Example: "Example Question"
     * @bodyParam QuestionType string optional. Example: "Example QuestionType"
     * @bodyParam QuestionTypeDescription string optional. Example: "Example QuestionTypeDescription"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedDate string optional. date. Example: "Example CreatedDate"
     * @bodyParam UpdatedBy string optional. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedDate string optional. date. Example: "Example UpdatedDate"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "question": {
     *                 "id": 1,
     *                 "question": "Example value",
     *                 "question_type": "Example value",
     *                 "question_type_description": "Example value",
     *                 "created_by": "Example value",
     *                 "created_date": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_date": "Example value",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackQuestionResource
     */
    public function update(UpdateFeedbackQuestionRequest $request, FeedbackQuestion $feedbackQuestion)
    {
        try {
            $validatedData = $request->validated();

            $updatedQuestion = $this->questionService->updateQuestion($feedbackQuestion, $validatedData);

            return $this->successResponse([
                'message' => 'Feedback question updated successfully',
                'question' => new FeedbackQuestionResource($updatedQuestion)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating feedback question: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update feedback question',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackQuestion
     *
     * @method DELETE
     *
     * Delete a feedbackquestion
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the feedbackquestion to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackQuestion $feedbackQuestion)
    {
        //
    }
}
