<?php

namespace App\Http\Controllers;

use App\Models\FeedbackResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\FeedbackResponseService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\FeedbackResponseResource;
use App\Http\Requests\StoreFeedbackResponseRequest;
use App\Http\Requests\UpdateFeedbackResponseRequest;

class FeedbackResponseController extends Controller
{
    use ApiResponse;

    public function __construct(private FeedbackResponseService $responseService)
    {
    }

    /**
     * @group FeedbackResponse
     *
     * @method GET
     *
     * List all feedbackresponse
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
            $data = $this->responseService->getFeedbackResponses($perPage);

            return $this->successResponse([
                'feedback_responses' => FeedbackResponseResource::collection($data['responses']),
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
     * @group FeedbackResponse
     *
     * @method GET
     *
     * Create feedbackresponse
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "response": {
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
     * @return FeedbackResponseResource
     */
    public function create()
    {
        //
    }

    /**
     * @group FeedbackResponse
     *
     * @method POST
     *
     * Create a new feedbackresponse
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam PatientName string required. Example: "Example PatientName"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam DateOfFeedBack string required. date. Example: "Example DateOfFeedBack"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam UpdatedBy string required. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedOn string required. date. Example: "Example UpdatedOn"
     * @bodyParam Status string required. Example: "Example Status"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "response": {
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
     * @return FeedbackResponseResource
     */
    public function store(StoreFeedbackResponseRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $response = $this->responseService->createResponse($validatedData);

            return $this->successResponse([
                'message' => 'Feedback response created successfully',
                'response' => new FeedbackResponseResource($response)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating feedback response: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create feedback response',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackResponse
     *
     * @method GET
     *
     * Get a specific feedbackresponse
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponse to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "response": {
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
     * @return FeedbackResponseResource
     */
    public function show(FeedbackResponse $feedbackResponse)
    {
        //
    }

    /**
     * @group FeedbackResponse
     *
     * @method GET
     *
     * Edit feedbackresponse
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the feedbackresponse to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "response": {
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
     * @return FeedbackResponseResource
     */
    public function edit(FeedbackResponse $feedbackResponse)
    {
        //
    }

    /**
     * @group FeedbackResponse
     *
     * @method PUT
     *
     * Update an existing feedbackresponse
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponse to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam PatientName string optional. Example: "Example PatientName"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam DateOfFeedBack string optional. date. Example: "Example DateOfFeedBack"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam UpdatedBy string optional. date. Example: "Example UpdatedBy"
     * @bodyParam UpdatedOn string optional. date. Example: "Example UpdatedOn"
     * @bodyParam Status string optional. Example: "Example Status"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "response": {
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
     * @return FeedbackResponseResource
     */
    public function update(UpdateFeedbackResponseRequest $request, FeedbackResponse $feedbackResponse)
    {
        try {
            $validatedData = $request->validated();

            $updatedResponse = $this->responseService->updateResponse($feedbackResponse, $validatedData);

            return $this->successResponse([
                'message' => 'Feedback response updated successfully',
                'response' => new FeedbackResponseResource($updatedResponse)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating feedback response: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update feedback response',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group FeedbackResponse
     *
     * @method DELETE
     *
     * Delete a feedbackresponse
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the feedbackresponse to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedbackResponse $feedbackResponse)
    {
        //
    }
}
