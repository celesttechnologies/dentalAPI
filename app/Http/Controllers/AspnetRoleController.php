<?php

namespace App\Http\Controllers;

use App\Models\AspnetRole;
use Illuminate\Http\Request;
use App\Services\AspnetRoleService;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Resources\AspnetRoleResource;
use App\Http\Requests\StoreAspnetRoleRequest;
use App\Http\Requests\UpdateAspnetRoleRequest;

class AspnetRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use ApiResponse;
    public function __construct(
        private AspnetRoleService $aspnetRoleService // ✅ Fixed case & typo
    ) {

    }

    /**
     * @group AspnetRole
     *
     * @method GET
     *
     * List all aspnetrole
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetRoles": [
     *                 {
     *                     "application_id": 1,
     *                     "role_id": 1,
     *                     "role_name": "Example Name",
     *                     "lowered_role_name": "Example Name",
     *                     "description": "Example value"
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

            $aspnetRoleList = $this->aspnetRoleService->getAspnetRoleService($perPage);

            return $this->successResponse([
                'aspnetRoles' => AspnetRoleResource::collection($aspnetRoleList['aspnetRoles']),
                'pagination' => $aspnetRoleList['pagination']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.', 'error' => $e->getMessage()]);
        }
    }

    /**
     * @group AspnetRole
     *
     * @method GET
     *
     * Create aspnetrole
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role": {
     *                 "application_id": 1,
     *                 "role_id": 1,
     *                 "role_name": "Example Name",
     *                 "lowered_role_name": "Example Name",
     *                 "description": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetRoleResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetRole
     *
     * @method POST
     *
     * Create a new aspnetrole
     *
     * @post /
     *
     * @bodyParam RoleId string required. Maximum length: 255. Example: "Example RoleId"
     * @bodyParam ApplicationId string required. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam RoleName string required. Maximum length: 255. Example: "Example RoleName"
     * @bodyParam LoweredRoleName string required. Maximum length: 255. Example: "Example LoweredRoleName"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "role": {
     *                 "application_id": 1,
     *                 "role_id": 1,
     *                 "role_name": "Example Name",
     *                 "lowered_role_name": "Example Name",
     *                 "description": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetRoleResource
     */
    public function store(StoreAspnetRoleRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $role = $this->aspnetRoleService->createRole($validatedData);

            return $this->successResponse([
                'message' => 'Role created successfully',
                'role' => new AspnetRoleResource($role)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating role: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetRole
     *
     * @method GET
     *
     * Get a specific aspnetrole
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetrole to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role": {
     *                 "application_id": 1,
     *                 "role_id": 1,
     *                 "role_name": "Example Name",
     *                 "lowered_role_name": "Example Name",
     *                 "description": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetRoleResource
     */
    public function show(AspnetRole $aspnetRole)
    {
        //
    }

    /**
     * @group AspnetRole
     *
     * @method GET
     *
     * Edit aspnetrole
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetrole to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role": {
     *                 "application_id": 1,
     *                 "role_id": 1,
     *                 "role_name": "Example Name",
     *                 "lowered_role_name": "Example Name",
     *                 "description": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetRoleResource
     */
    public function edit(AspnetRole $aspnetRole)
    {
        //
    }

    /**
     * @group AspnetRole
     *
     * @method PUT
     *
     * Update an existing aspnetrole
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetrole to update. Example: 1
     *
     * @bodyParam RoleId string optional. Maximum length: 255. Example: "Example RoleId"
     * @bodyParam ApplicationId string optional. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam RoleName string optional. Maximum length: 255. Example: "Example RoleName"
     * @bodyParam LoweredRoleName string optional. Maximum length: 255. Example: "Example LoweredRoleName"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role": {
     *                 "application_id": 1,
     *                 "role_id": 1,
     *                 "role_name": "Example Name",
     *                 "lowered_role_name": "Example Name",
     *                 "description": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetRoleResource
     */
    public function update(UpdateAspnetRoleRequest $request, AspnetRole $aspnetRole)
    {
        try {
            $validatedData = $request->validated();

            $updatedRole = $this->aspnetRoleService->updateRole($aspnetRole, $validatedData);

            return $this->successResponse([
                'message' => 'Role updated successfully',
                'role' => new AspnetRoleResource($updatedRole)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating role: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update role',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetRole
     *
     * @method DELETE
     *
     * Delete a aspnetrole
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetrole to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetRole $aspnetRole)
    {
        //
    }
}
