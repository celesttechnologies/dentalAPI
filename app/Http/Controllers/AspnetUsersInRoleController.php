<?php

namespace App\Http\Controllers;

use App\Models\AspnetUsersInRole;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetUsersInRoleService; // Ensure this service exists
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AspnetUsersInRoleResource;
use App\Http\Requests\StoreAspnetUsersInRoleRequest;
use App\Http\Requests\UpdateAspnetUsersInRoleRequest;

class AspnetUsersInRoleController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AspnetUsersInRoleService $aspnetUsersInRoleService // Ensure this service exists
    ) {
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method GET
     *
     * List all aspnetusersinrole
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "usersInRole": [
     *                 {
     *                     "user_id": 1,
     *                     "role_id": 1
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

            $usersInRole = $this->aspnetUsersInRoleService->getAspnetUsersInRole($perPage);

            return $this->successResponse([
                'usersInRole' => AspnetUsersInRoleResource::collection($usersInRole['usersInRole']),
                'pagination' => $usersInRole['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching users in role: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group AspnetUsersInRole
     *
     * @method GET
     *
     * Create aspnetusersinrole
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user_in_role": {
     *                 "user_id": 1,
     *                 "role_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUsersInRoleResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method POST
     *
     * Create a new aspnetusersinrole
     *
     * @post /
     *
     * @bodyParam UserId string required. Maximum length: 255. Example: "Example UserId"
     * @bodyParam RoleId string required. Maximum length: 255. Example: "Example RoleId"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "user_in_role": {
     *                 "user_id": 1,
     *                 "role_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUsersInRoleResource
     */
    public function store(StoreAspnetUsersInRoleRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $userInRole = $this->aspnetUsersInRoleService->createUsersInRole($validatedData);

            return $this->successResponse([
                'message' => 'User role assignment created successfully',
                'user_in_role' => new AspnetUsersInRoleResource($userInRole)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating user role assignment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create user role assignment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method GET
     *
     * Get a specific aspnetusersinrole
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetusersinrole to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user_in_role": {
     *                 "user_id": 1,
     *                 "role_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUsersInRoleResource
     */
    public function show(AspnetUsersInRole $aspnetUsersInRole)
    {
        //
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method GET
     *
     * Edit aspnetusersinrole
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetusersinrole to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user_in_role": {
     *                 "user_id": 1,
     *                 "role_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUsersInRoleResource
     */
    public function edit(AspnetUsersInRole $aspnetUsersInRole)
    {
        //
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method PUT
     *
     * Update an existing aspnetusersinrole
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetusersinrole to update. Example: 1
     *
     * @bodyParam UserId string optional. Maximum length: 255. Example: "Example UserId"
     * @bodyParam RoleId string optional. Maximum length: 255. Example: "Example RoleId"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "user_in_role": {
     *                 "user_id": 1,
     *                 "role_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetUsersInRoleResource
     */
    public function update(UpdateAspnetUsersInRoleRequest $request, AspnetUsersInRole $aspnetUsersInRole)
    {
        try {
            $validatedData = $request->validated();

            $updatedUserInRole = $this->aspnetUsersInRoleService->updateUsersInRole($aspnetUsersInRole, $validatedData);

            return $this->successResponse([
                'message' => 'User role assignment updated successfully',
                'user_in_role' => new AspnetUsersInRoleResource($updatedUserInRole)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating user role assignment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update user role assignment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetUsersInRole
     *
     * @method DELETE
     *
     * Delete a aspnetusersinrole
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetusersinrole to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetUsersInRole $aspnetUsersInRole)
    {
        //
    }
}
