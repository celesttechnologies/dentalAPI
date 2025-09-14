<?php

namespace App\Http\Controllers;

use App\Models\AspnetPersonalizationPerUser;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetPersonalizationPerUserService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AspnetPersonalizationPerUserResource;
use App\Http\Requests\StoreAspnetPersonalizationPerUserRequest;
use App\Http\Requests\UpdateAspnetPersonalizationPerUserRequest;

class AspnetPersonalizationPerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponse;

    public function __construct(
        private AspnetPersonalizationPerUserService $aspnetPersonalizationPerUserService // ✅ Fixed case & typo
    ) {

    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method GET
     *
     * List all aspnetpersonalizationperuser
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetPersonalizationPerUsers": [
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

            $aspnetPersonalizationUsers = $this->aspnetPersonalizationPerUserService->getAspnetPersonalizationPerUser($perPage);

            return $this->successResponse([
                'aspnetPersonalizationPerUsers' => AspnetPersonalizationPerUserResource::collection($aspnetPersonalizationUsers['aspnetPersonalizationPerUsers']),
                'pagination' => $aspnetPersonalizationUsers['pagination']
            ]);
        } catch (Exception $e) {

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',

            ]);
        }

    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method GET
     *
     * Create aspnetpersonalizationperuser
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationPerUserResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method POST
     *
     * Create a new aspnetpersonalizationperuser
     *
     * @post /
     *
     * @bodyParam PathId string required. Maximum length: 255. Example: "Example PathId"
     * @bodyParam UserId string required. Maximum length: 255. Example: "Example UserId"
     * @bodyParam PageSettings string required. Example: "Example PageSettings"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationPerUserResource
     */
    public function store(StoreAspnetPersonalizationPerUserRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $personalization = $this->aspnetPersonalizationPerUserService->createPersonalizationPerUser($validatedData);

            return $this->successResponse([
                'message' => 'User personalization created successfully',
                'personalization' => new AspnetPersonalizationPerUserResource($personalization)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating user personalization: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create user personalization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method GET
     *
     * Get a specific aspnetpersonalizationperuser
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationperuser to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationPerUserResource
     */
    public function show(AspnetPersonalizationPerUser $aspnetPersonalizationPerUser)
    {
        //
    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method GET
     *
     * Edit aspnetpersonalizationperuser
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationperuser to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationPerUserResource
     */
    public function edit(AspnetPersonalizationPerUser $aspnetPersonalizationPerUser)
    {
        //
    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method PUT
     *
     * Update an existing aspnetpersonalizationperuser
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationperuser to update. Example: 1
     *
     * @bodyParam PathId string optional. Maximum length: 255. Example: "Example PathId"
     * @bodyParam UserId string optional. Maximum length: 255. Example: "Example UserId"
     * @bodyParam PageSettings string optional. Example: "Example PageSettings"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "personalization": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPersonalizationPerUserResource
     */
    public function update(UpdateAspnetPersonalizationPerUserRequest $request, AspnetPersonalizationPerUser $aspnetPersonalizationPerUser)
    {
        try {
            $validatedData = $request->validated();

            $updatedPersonalization = $this->aspnetPersonalizationPerUserService->updatePersonalizationPerUser($aspnetPersonalizationPerUser, $validatedData);

            return $this->successResponse([
                'message' => 'User personalization updated successfully',
                'personalization' => new AspnetPersonalizationPerUserResource($updatedPersonalization)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating user personalization: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update user personalization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPersonalizationPerUser
     *
     * @method DELETE
     *
     * Delete a aspnetpersonalizationperuser
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpersonalizationperuser to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetPersonalizationPerUser $aspnetPersonalizationPerUser)
    {
        //
    }
}
