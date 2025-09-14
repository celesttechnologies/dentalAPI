<?php

namespace App\Http\Controllers;

use App\Models\AspnetUser;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetUserService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AspnetUserResource;
use App\Http\Requests\StoreAspnetUserRequest;
use App\Http\Requests\UpdateAspnetUserRequest;

class AspnetUserController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AspnetUserService $aspnetUserService // Ensure this service exists
    ) {
    }

    /**
     * @group AspnetUser
     *
     * @method GET
     *
     * List all aspnetuser
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "users": [
     *                 {
     *                     "application_id": 1,
     *                     "user_id": 1,
     *                     "username": "Example Name",
     *                     "lowered_username": "Example Name",
     *                     "mobile_alias": "Example value",
     *                     "is_anonymous": true,
     *                     "last_activity_date": "Example value",
     *                     "clinic_id": 1,
     *                     "client_id": 1
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

            $users = $this->aspnetUserService->getAspnetUsers($perPage);

            return $this->successResponse([
                'users' => AspnetUserResource::collection($users['users']),
                'pagination' => $users['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group AspnetUser
     *
     * @method GET
     *
     * Create aspnetuser
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user": {
     *                 "application_id": 1,
     *                 "user_id": 1,
     *                 "username": "Example Name",
     *                 "lowered_username": "Example Name",
     *                 "mobile_alias": "Example value",
     *                 "is_anonymous": true,
     *                 "last_activity_date": "Example value",
     *                 "clinic_id": 1,
     *                 "client_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUserResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetUser
     *
     * @method POST
     *
     * Create a new aspnetuser
     *
     * @post /
     *
     * @bodyParam UserId string required. Maximum length: 255. Example: "Example UserId"
     * @bodyParam ApplicationId string required. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam UserName string required. Maximum length: 255. Example: "Example UserName"
     * @bodyParam LoweredUserName string required. Maximum length: 255. Example: "Example LoweredUserName"
     * @bodyParam MobileAlias string optional. nullable. Maximum length: 255. Example: "Example MobileAlias"
     * @bodyParam IsAnonymous boolean required. Example: true
     * @bodyParam LastActivityDate string required. date. Example: "Example LastActivityDate"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "user": {
     *                 "application_id": 1,
     *                 "user_id": 1,
     *                 "username": "Example Name",
     *                 "lowered_username": "Example Name",
     *                 "mobile_alias": "Example value",
     *                 "is_anonymous": true,
     *                 "last_activity_date": "Example value",
     *                 "clinic_id": 1,
     *                 "client_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUserResource
     */
    public function store(StoreAspnetUserRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $user = $this->aspnetUserService->createUser($validatedData);

            return $this->successResponse([
                'message' => 'User created successfully',
                'user' => new AspnetUserResource($user)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetUser
     *
     * @method GET
     *
     * Get a specific aspnetuser
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetuser to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user": {
     *                 "application_id": 1,
     *                 "user_id": 1,
     *                 "username": "Example Name",
     *                 "lowered_username": "Example Name",
     *                 "mobile_alias": "Example value",
     *                 "is_anonymous": true,
     *                 "last_activity_date": "Example value",
     *                 "clinic_id": 1,
     *                 "client_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUserResource
     */
    public function show(AspnetUser $aspnetUser)
    {
        //
    }

    /**
     * @group AspnetUser
     *
     * @method GET
     *
     * Edit aspnetuser
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetuser to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user": {
     *                 "application_id": 1,
     *                 "user_id": 1,
     *                 "username": "Example Name",
     *                 "lowered_username": "Example Name",
     *                 "mobile_alias": "Example value",
     *                 "is_anonymous": true,
     *                 "last_activity_date": "Example value",
     *                 "clinic_id": 1,
     *                 "client_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUserResource
     */
    public function edit(AspnetUser $aspnetUser)
    {
        //
    }

    /**
     * @group AspnetUser
     *
     * @method PUT
     *
     * Update an existing aspnetuser
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetuser to update. Example: 1
     *
     * @bodyParam UserId string optional. Maximum length: 255. Example: "Example UserId"
     * @bodyParam ApplicationId string optional. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam UserName string optional. Maximum length: 255. Example: "Example UserName"
     * @bodyParam LoweredUserName string optional. Maximum length: 255. Example: "Example LoweredUserName"
     * @bodyParam MobileAlias string optional. nullable. Maximum length: 255. Example: "Example MobileAlias"
     * @bodyParam IsAnonymous boolean optional. Example: true
     * @bodyParam LastActivityDate string optional. date. Example: "Example LastActivityDate"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user": {
     *                 "application_id": 1,
     *                 "user_id": 1,
     *                 "username": "Example Name",
     *                 "lowered_username": "Example Name",
     *                 "mobile_alias": "Example value",
     *                 "is_anonymous": true,
     *                 "last_activity_date": "Example value",
     *                 "clinic_id": 1,
     *                 "client_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUserResource
     */
    public function update(UpdateAspnetUserRequest $request, AspnetUser $aspnetUser)
    {
        try {
            $validatedData = $request->validated();

            $updatedUser = $this->aspnetUserService->updateUser($aspnetUser, $validatedData);

            return $this->successResponse([
                'message' => 'User updated successfully',
                'user' => new AspnetUserResource($updatedUser)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetUser
     *
     * @method DELETE
     *
     * Delete a aspnetuser
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetuser to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetUser $aspnetUser)
    {
        //
    }
}
