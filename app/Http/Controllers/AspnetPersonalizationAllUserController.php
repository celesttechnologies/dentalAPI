<?php

namespace App\Http\Controllers;

use App\Models\AspnetPersonalizationAllUser;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetPersonalizationAllUserService;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreAspnetPersonalizationAllUserRequest;
use App\Http\Requests\UpdateAspnetPersonalizationAllUserRequest;
use App\Http\Resources\AspnetPersonalizationAllUserListResource;

class AspnetPersonalizationAllUserController extends Controller
{
    use ApiResponse;

    public function __construct(
        private AspnetPersonalizationAllUserService $aspnetPersonalizationAllUserService
    ) {
    }

    /**
     * @group AspnetPersonalizationAllUser
     *
     * @method GET
     *
     * List all aspnetpersonalizationalluser
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "AspnetPersonalizationAllUsers": [
     *                 {
     *                     "path_id": 1,
     *                     "page_settings": "Example value",
     *                     "last_updated_date": "Example value"
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

            // Call the service to get the data
            $aspnetPersonalizationUsers = $this->aspnetPersonalizationAllUserService->getAspnetPersonalizationAllUser($perPage);

            // Ensure the expected keys exist before accessing them
            return $this->successResponse([
                'AspnetPersonalizationAllUsers' => AspnetPersonalizationAllUserListResource::collection($aspnetPersonalizationUsers['AspnetPersonalizationAllUsers']),
                'pagination' => $aspnetPersonalizationUsers['pagination']
            ]);
        } catch (Exception $e) {
            // Log the full error message
            Log::error('Error fetching personalization users: ' . $e->getMessage());

            // Return a structured error response
            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.'
            ]);
        }
    }

    /**
     * @group AspnetPersonalizationAllUser
     *
     * @method POST
     *
     * Create a new aspnetpersonalizationalluser
     *
     * @post /
     *
     * @bodyParam PathId string required. Maximum length: 255. Example: "Example PathId"
     * @bodyParam PageSettings string required. Example: "Example PageSettings"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": {
     *                 "path_id": 1,
     *                 "page_settings": "Example value",
     *                 "last_updated_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationAllUserListResource
     */
    public function store(StoreAspnetPersonalizationAllUserRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $personalization = $this->aspnetPersonalizationAllUserService->createPersonalizationAllUser($validatedData);

            return $this->successResponse([
                'message' => 'Personalization created successfully',
                'personalization' => new AspnetPersonalizationAllUserListResource($personalization)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating personalization: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create personalization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPersonalizationAllUser
     *
     * @method GET
     *
     * Get a specific aspnetpersonalizationalluser
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationalluser to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": {
     *                 "path_id": 1,
     *                 "page_settings": "Example value",
     *                 "last_updated_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationAllUserListResource
     */
    public function show(AspnetPersonalizationAllUser $aspnetPersonalizationAllUser)
    {
        //
    }

    /**
     * @group AspnetPersonalizationAllUser
     *
     * @method PUT
     *
     * Update an existing aspnetpersonalizationalluser
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationalluser to update. Example: 1
     *
     * @bodyParam PathId string optional. Maximum length: 255. Example: "Example PathId"
     * @bodyParam PageSettings string optional. Example: "Example PageSettings"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": {
     *                 "path_id": 1,
     *                 "page_settings": "Example value",
     *                 "last_updated_date": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationAllUserListResource
     */
    public function update(UpdateAspnetPersonalizationAllUserRequest $request, AspnetPersonalizationAllUser $aspnetPersonalizationAllUser)
    {
        try {
            $validatedData = $request->validated();

            $updatedPersonalization = $this->aspnetPersonalizationAllUserService->updatePersonalizationAllUser($aspnetPersonalizationAllUser, $validatedData);

            return $this->successResponse([
                'message' => 'Personalization updated successfully',
                'personalization' => new AspnetPersonalizationAllUserListResource($updatedPersonalization)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating personalization: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update personalization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPersonalizationAllUser
     *
     * @method DELETE
     *
     * Delete a aspnetpersonalizationalluser
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationalluser to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetPersonalizationAllUser $aspnetPersonalizationAllUser)
    {
        //
    }
}
