<?php

namespace App\Http\Controllers;

use App\Services\UsersClinicInfoService;
use App\Http\Resources\UsersClinicInfoResource;
use App\Models\UsersClinicInfo;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUsersClinicInfoRequest;
use App\Http\Requests\UpdateUsersClinicInfoRequest;

class UsersClinicInfoController extends Controller
{
    use ApiResponse;

    public function __construct(private UsersClinicInfoService $usersClinicInfoService)
    {
    }

    /**
     * @group UsersClinicInfo
     *
     * @method GET
     *
     * List all usersclinicinfo
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "users_clinic_info": [
     *                 []
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
            $data = $this->usersClinicInfoService->getUsersClinicInfo($perPage);

            return $this->successResponse([
                'users_clinic_info' => UsersClinicInfoResource::collection($data['users_clinic_info']),
                'pagination' => $data['pagination'],
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Users Clinic Info: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group UsersClinicInfo
     *
     * @method GET
     *
     * Create usersclinicinfo
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_info": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return UsersClinicInfoResource
     */
    public function create()
    {
        //
    }

    /**
     * @group UsersClinicInfo
     *
     * @method POST
     *
     * Create a new usersclinicinfo
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_info": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return UsersClinicInfoResource
     */
    public function store(StoreUsersClinicInfoRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $clinicInfo = $this->usersClinicInfoService->createUsersClinicInfo($validatedData);

            return $this->successResponse([
                'message' => 'Users Clinic Info created successfully',
                'clinic_info' => new UsersClinicInfoResource($clinicInfo)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating Users Clinic Info: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create Users Clinic Info',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group UsersClinicInfo
     *
     * @method GET
     *
     * Get a specific usersclinicinfo
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the usersclinicinfo to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_info": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return UsersClinicInfoResource
     */
    public function show(UsersClinicInfo $usersClinicInfo)
    {
        //
    }

    /**
     * @group UsersClinicInfo
     *
     * @method GET
     *
     * Edit usersclinicinfo
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the usersclinicinfo to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_info": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return UsersClinicInfoResource
     */
    public function edit(UsersClinicInfo $usersClinicInfo)
    {
        //
    }

    /**
     * @group UsersClinicInfo
     *
     * @method PUT
     *
     * Update an existing usersclinicinfo
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the usersclinicinfo to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_info": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return UsersClinicInfoResource
     */
    public function update(UpdateUsersClinicInfoRequest $request, UsersClinicInfo $usersClinicInfo)
    {
        try {
            $validatedData = $request->validated();

            $updatedClinicInfo = $this->usersClinicInfoService->updateUsersClinicInfo($usersClinicInfo, $validatedData);

            return $this->successResponse([
                'message' => 'Users Clinic Info updated successfully',
                'clinic_info' => new UsersClinicInfoResource($updatedClinicInfo)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating Users Clinic Info: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update Users Clinic Info',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group UsersClinicInfo
     *
     * @method DELETE
     *
     * Delete a usersclinicinfo
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the usersclinicinfo to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersClinicInfo $usersClinicInfo)
    {
        //
    }
}
