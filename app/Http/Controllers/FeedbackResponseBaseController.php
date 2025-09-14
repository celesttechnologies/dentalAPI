<?php

namespace App\Http\Controllers;

use App\Models\FeedbackResponseBase;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\FeedbackResponseBaseService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\FeedbackResponseBaseResource;
use App\Http\Requests\StoreFeedbackResponseBaseRequest;
use App\Http\Requests\UpdateFeedbackResponseBaseRequest;

class FeedbackResponseBaseController extends Controller
{
    use ApiResponse;

    public function __construct(private FeedbackResponseBaseService $responseBaseService)
    {
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method GET
     *
     * List all feedbackresponsebase
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "feedback_responses": [
     *                 {
     *                     "feedback_id": 1,
     *                     "clinic_id": 1,
     *                     "patient_id": 1,
     *                     "provider_id": 1,
     *                     "patient_name": "Example Name",
     *                     "mobile_number": "Example value",
     *                     "date_of_feedback": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "updated_by": "Example value",
     *                     "updated_on": "Example value",
     *                     "status": "Example value"
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
            $data = $this->responseBaseService->getFeedbackResponses($perPage);

            return $this->successResponse([
                'feedback_responses' => FeedbackResponseBaseResource::collection($data['responses']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Feedback Responses: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method GET
     *
     * Create feedbackresponsebase
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "responseBase": {
     *                 "feedback_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "patient_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "date_of_feedback": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_on": "Example value",
     *                 "status": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackResponseBaseResource
     */
    public function create()
    {
        //
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method POST
     *
     * Create a new feedbackresponsebase
     *
     * @post /
     *
     * @bodyParam FeedbackID string required. Maximum length: 255. Example: "Example FeedbackID"
     * @bodyParam QuestionID string required. Maximum length: 255. Example: "Example QuestionID"
     * @bodyParam QuestionTypeID string required. Maximum length: 255. Example: "Example QuestionTypeID"
     * @bodyParam ResponseValue string required. Example: "Example ResponseValue"
     * @bodyParam ResponseDescription string required. Example: "Example ResponseDescription"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam UpdatedBy string required. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedOn string required. date. Example: "Example UpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "responseBase": {
     *                 "feedback_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "patient_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "date_of_feedback": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_on": "Example value",
     *                 "status": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackResponseBaseResource
     */
    public function store(StoreFeedbackResponseBaseRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $responseBase = $this->responseBaseService->createResponseBase($validatedData);

            return $this->successResponse([
                'message' => 'Feedback response base created successfully',
                'responseBase' => new FeedbackResponseBaseResource($responseBase)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating feedback response base: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create feedback response base',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method GET
     *
     * Get a specific feedbackresponsebase
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponsebase to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "responseBase": {
     *                 "feedback_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "patient_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "date_of_feedback": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_on": "Example value",
     *                 "status": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackResponseBaseResource
     */
    public function show(FeedbackResponseBase $feedbackResponseBase)
    {
        //
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method GET
     *
     * Edit feedbackresponsebase
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the feedbackresponsebase to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "responseBase": {
     *                 "feedback_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "patient_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "date_of_feedback": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_on": "Example value",
     *                 "status": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackResponseBaseResource
     */
    public function edit(FeedbackResponseBase $feedbackResponseBase)
    {
        //
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method PUT
     *
     * Update an existing feedbackresponsebase
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponsebase to update. Example: 1
     *
     * @bodyParam FeedbackID string optional. Maximum length: 255. Example: "Example FeedbackID"
     * @bodyParam QuestionID string optional. Maximum length: 255. Example: "Example QuestionID"
     * @bodyParam QuestionTypeID string optional. Maximum length: 255. Example: "Example QuestionTypeID"
     * @bodyParam ResponseValue string optional. Example: "Example ResponseValue"
     * @bodyParam ResponseDescription string optional. Example: "Example ResponseDescription"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam UpdatedBy string optional. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedOn string optional. date. Example: "Example UpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "responseBase": {
     *                 "feedback_id": 1,
     *                 "clinic_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "patient_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "date_of_feedback": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "updated_by": "Example value",
     *                 "updated_on": "Example value",
     *                 "status": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return FeedbackResponseBaseResource
     */
    public function update(UpdateFeedbackResponseBaseRequest $request, FeedbackResponseBase $feedbackResponseBase)
    {
        try {
            $validatedData = $request->validated();

            $updatedResponseBase = $this->responseBaseService->updateResponseBase($feedbackResponseBase, $validatedData);

            return $this->successResponse([
                'message' => 'Feedback response base updated successfully',
                'responseBase' => new FeedbackResponseBaseResource($updatedResponseBase)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating feedback response base: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update feedback response base',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackResponseBase
     *
     * @method DELETE
     *
     * Delete a feedbackresponsebase
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponsebase to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackResponseBase $feedbackResponseBase)
    {
        //
    }
}
