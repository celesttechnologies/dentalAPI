<?php

namespace App\Http\Controllers;

use App\Models\AspnetMembership;
use App\Services\AspnetMembershipService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Http\Resources\AspnetMembershipResource;
use App\Http\Requests\StoreAspnetMembershipRequest;
use App\Http\Requests\UpdateAspnetMembershipRequest;
use Illuminate\Support\Facades\Log;

class AspnetMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use ApiResponse;

    public function __construct(
        private AspnetMembershipService $aspnetMembershipService
    ) {

    }

    /**
     * @group AspnetMembership
     *
     * @method GET
     *
     * List all aspnetmembership
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetMembership": [
     *                 {
     *                     "id": 1,
     *                     "password": "password123",
     *                     "password_format": "Example value",
     *                     "password_salt": "Example value",
     *                     "mobile_pin": "Example value",
     *                     "email": "user@example.com",
     *                     "lowered_email": "user@example.com",
     *                     "password_question": "Example value",
     *                     "password_answer": "Example value",
     *                     "is_approved": true,
     *                     "is_locked_out": true,
     *                     "created_on": "Example value",
     *                     "last_login_on": "Example value",
     *                     "last_password_changed_on": "Example value",
     *                     "last_lockout_on": "Example value",
     *                     "failed_password_attempt_count": "Example value",
     *                     "failed_password_attempt_window_start": "Example value",
     *                     "failed_password_answer_attempt_count": "Example value",
     *                     "failed_password_answer_attempt_window_start": "Example value",
     *                     "comment": "Example value"
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
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 10));

            $aspnetMembershipList = $this->aspnetMembershipService->getAspnetMembershipList($perPage);

            return $this->successResponse(['aspnetMembership' => AspnetMembershipResource::collection($aspnetMembershipList['aspnetMembership']), 'pagination' => $aspnetMembershipList['pagination']]);
        } catch (Exception $e) {
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group AspnetMembership
     *
     * @method GET
     *
     * Create aspnetmembership
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "membership": {
     *                 "id": 1,
     *                 "password": "password123",
     *                 "password_format": "Example value",
     *                 "password_salt": "Example value",
     *                 "mobile_pin": "Example value",
     *                 "email": "user@example.com",
     *                 "lowered_email": "user@example.com",
     *                 "password_question": "Example value",
     *                 "password_answer": "Example value",
     *                 "is_approved": true,
     *                 "is_locked_out": true,
     *                 "created_on": "Example value",
     *                 "last_login_on": "Example value",
     *                 "last_password_changed_on": "Example value",
     *                 "last_lockout_on": "Example value",
     *                 "failed_password_attempt_count": "Example value",
     *                 "failed_password_attempt_window_start": "Example value",
     *                 "failed_password_answer_attempt_count": "Example value",
     *                 "failed_password_answer_attempt_window_start": "Example value",
     *                 "comment": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetMembershipResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetMembership
     *
     * @method POST
     *
     * Create a new aspnetmembership
     *
     * @post /
     *
     * @bodyParam UserId string required. Maximum length: 255. Example: "Example UserId"
     * @bodyParam Password string required. Example: "Example Password"
     * @bodyParam PasswordFormat number required. integer. Example: 1
     * @bodyParam PasswordSalt string required. Example: "Example PasswordSalt"
     * @bodyParam Email string required. Must be a valid email address. Example: "Example Email"
     * @bodyParam PasswordQuestion string optional. nullable. Maximum length: 255. Example: "Example PasswordQuestion"
     * @bodyParam PasswordAnswer string optional. nullable. Maximum length: 255. Example: "Example PasswordAnswer"
     * @bodyParam IsApproved boolean required. Example: true
     * @bodyParam IsLockedOut boolean required. Example: true
     * @bodyParam CreateDate string required. date. Example: "Example CreateDate"
     * @bodyParam LastLoginDate string optional. nullable. date. Example: "Example LastLoginDate"
     * @bodyParam LastPasswordChangedDate string optional. nullable. date. Example: "Example LastPasswordChangedDate"
     * @bodyParam FailedPasswordAttemptCount number required. integer. Example: 1
     * @bodyParam FailedPasswordAttemptWindowStart string optional. nullable. date. Example: "Example FailedPasswordAttemptWindowStart"
     * @bodyParam FailedPasswordAnswerAttemptCount number required. integer. Example: 1
     * @bodyParam FailedPasswordAnswerAttemptWindowStart string optional. nullable. date. Example: "Example FailedPasswordAnswerAttemptWindowStart"
     * @bodyParam Comment string optional. nullable. Example: "Example Comment"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "membership": {
     *                 "id": 1,
     *                 "password": "password123",
     *                 "password_format": "Example value",
     *                 "password_salt": "Example value",
     *                 "mobile_pin": "Example value",
     *                 "email": "user@example.com",
     *                 "lowered_email": "user@example.com",
     *                 "password_question": "Example value",
     *                 "password_answer": "Example value",
     *                 "is_approved": true,
     *                 "is_locked_out": true,
     *                 "created_on": "Example value",
     *                 "last_login_on": "Example value",
     *                 "last_password_changed_on": "Example value",
     *                 "last_lockout_on": "Example value",
     *                 "failed_password_attempt_count": "Example value",
     *                 "failed_password_attempt_window_start": "Example value",
     *                 "failed_password_answer_attempt_count": "Example value",
     *                 "failed_password_answer_attempt_window_start": "Example value",
     *                 "comment": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetMembershipResource
     */
    public function store(StoreAspnetMembershipRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $membership = $this->aspnetMembershipService->createMembership($validatedData);

            return $this->successResponse([
                'message' => 'Membership created successfully',
                'membership' => new AspnetMembershipResource($membership)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating membership: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create membership',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetMembership
     *
     * @method GET
     *
     * Get a specific aspnetmembership
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetmembership to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "membership": {
     *                 "id": 1,
     *                 "password": "password123",
     *                 "password_format": "Example value",
     *                 "password_salt": "Example value",
     *                 "mobile_pin": "Example value",
     *                 "email": "user@example.com",
     *                 "lowered_email": "user@example.com",
     *                 "password_question": "Example value",
     *                 "password_answer": "Example value",
     *                 "is_approved": true,
     *                 "is_locked_out": true,
     *                 "created_on": "Example value",
     *                 "last_login_on": "Example value",
     *                 "last_password_changed_on": "Example value",
     *                 "last_lockout_on": "Example value",
     *                 "failed_password_attempt_count": "Example value",
     *                 "failed_password_attempt_window_start": "Example value",
     *                 "failed_password_answer_attempt_count": "Example value",
     *                 "failed_password_answer_attempt_window_start": "Example value",
     *                 "comment": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetMembershipResource
     */
    public function show(AspnetMembership $aspnetMembership)
    {
        //
    }

    /**
     * @group AspnetMembership
     *
     * @method GET
     *
     * Edit aspnetmembership
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetmembership to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "membership": {
     *                 "id": 1,
     *                 "password": "password123",
     *                 "password_format": "Example value",
     *                 "password_salt": "Example value",
     *                 "mobile_pin": "Example value",
     *                 "email": "user@example.com",
     *                 "lowered_email": "user@example.com",
     *                 "password_question": "Example value",
     *                 "password_answer": "Example value",
     *                 "is_approved": true,
     *                 "is_locked_out": true,
     *                 "created_on": "Example value",
     *                 "last_login_on": "Example value",
     *                 "last_password_changed_on": "Example value",
     *                 "last_lockout_on": "Example value",
     *                 "failed_password_attempt_count": "Example value",
     *                 "failed_password_attempt_window_start": "Example value",
     *                 "failed_password_answer_attempt_count": "Example value",
     *                 "failed_password_answer_attempt_window_start": "Example value",
     *                 "comment": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetMembershipResource
     */
    public function edit(AspnetMembership $aspnetMembership)
    {
        //
    }

    /**
     * @group AspnetMembership
     *
     * @method PUT
     *
     * Update an existing aspnetmembership
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetmembership to update. Example: 1
     *
     * @bodyParam UserId string optional. Maximum length: 255. Example: "Example UserId"
     * @bodyParam Password string optional. Example: "Example Password"
     * @bodyParam PasswordFormat number optional. integer. Example: 1
     * @bodyParam PasswordSalt string optional. Example: "Example PasswordSalt"
     * @bodyParam Email string optional. Must be a valid email address. Example: "Example Email"
     * @bodyParam PasswordQuestion string optional. nullable. Maximum length: 255. Example: "Example PasswordQuestion"
     * @bodyParam PasswordAnswer string optional. nullable. Maximum length: 255. Example: "Example PasswordAnswer"
     * @bodyParam IsApproved boolean optional. Example: true
     * @bodyParam IsLockedOut boolean optional. Example: true
     * @bodyParam CreateDate string optional. date. Example: "Example CreateDate"
     * @bodyParam LastLoginDate string optional. nullable. date. Example: "Example LastLoginDate"
     * @bodyParam LastPasswordChangedDate string optional. nullable. date. Example: "Example LastPasswordChangedDate"
     * @bodyParam FailedPasswordAttemptCount number optional. integer. Example: 1
     * @bodyParam FailedPasswordAttemptWindowStart string optional. nullable. date. Example: "Example FailedPasswordAttemptWindowStart"
     * @bodyParam FailedPasswordAnswerAttemptCount number optional. integer. Example: 1
     * @bodyParam FailedPasswordAnswerAttemptWindowStart string optional. nullable. date. Example: "Example FailedPasswordAnswerAttemptWindowStart"
     * @bodyParam Comment string optional. nullable. Example: "Example Comment"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "membership": {
     *                 "id": 1,
     *                 "password": "password123",
     *                 "password_format": "Example value",
     *                 "password_salt": "Example value",
     *                 "mobile_pin": "Example value",
     *                 "email": "user@example.com",
     *                 "lowered_email": "user@example.com",
     *                 "password_question": "Example value",
     *                 "password_answer": "Example value",
     *                 "is_approved": true,
     *                 "is_locked_out": true,
     *                 "created_on": "Example value",
     *                 "last_login_on": "Example value",
     *                 "last_password_changed_on": "Example value",
     *                 "last_lockout_on": "Example value",
     *                 "failed_password_attempt_count": "Example value",
     *                 "failed_password_attempt_window_start": "Example value",
     *                 "failed_password_answer_attempt_count": "Example value",
     *                 "failed_password_answer_attempt_window_start": "Example value",
     *                 "comment": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetMembershipResource
     */
    public function update(UpdateAspnetMembershipRequest $request, AspnetMembership $aspnetMembership)
    {
        try {
            $validatedData = $request->validated();

            $updatedMembership = $this->aspnetMembershipService->updateMembership($aspnetMembership, $validatedData);

            return $this->successResponse([
                'message' => 'Membership updated successfully',
                'membership' => new AspnetMembershipResource($updatedMembership)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating membership: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update membership',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetMembership
     *
     * @method DELETE
     *
     * Delete a aspnetmembership
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetmembership to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetMembership $aspnetMembership)
    {
        //
    }
}
