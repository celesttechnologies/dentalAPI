<?php

namespace App\Http\Controllers;

use App\Models\AspnetProfile;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\AspnetProfileService;
use App\Http\Requests\StoreAspnetProfileRequest;
use App\Http\Requests\UpdateAspnetProfileRequest;
use App\Http\Resources\AspnetProfileResource;

class AspnetProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponse;

    public function __construct(
        private AspnetProfileService $aspnetProfileService // ✅ Fixed case & typo
    ) {

    }

    /**
     * @group AspnetProfile
     *
     * @method GET
     *
     * List all aspnetprofile
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetProfile": [
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

            $aspnetProfile = $this->aspnetProfileService->getAspnetProfile($perPage);

            return $this->successResponse([
                'aspnetProfile' => AspnetProfileResource::collection($aspnetProfile['aspnetProfile']),
                'pagination' => $aspnetProfile['pagination']
            ]);
        } catch (Exception $e) {
            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group AspnetProfile
     *
     * @method GET
     *
     * Create aspnetprofile
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "profile": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetProfileResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetProfile
     *
     * @method POST
     *
     * Create a new aspnetprofile
     *
     * @post /
     *
     * @bodyParam UserId string required. Maximum length: 255. Example: "Example UserId"
     * @bodyParam PropertyNames string required. Example: "Example PropertyNames"
     * @bodyParam PropertyValuesString string required. Example: "Example PropertyValuesString"
     * @bodyParam PropertyValuesBinary string optional. nullable. Example: "Example PropertyValuesBinary"
     * @bodyParam LastUpdatedDate string optional. nullable. date. Example: "Example LastUpdatedDate"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "profile": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetProfileResource
     */
    public function store(StoreAspnetProfileRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $profile = $this->aspnetProfileService->createProfile($validatedData);

            return $this->successResponse([
                'message' => 'Profile created successfully',
                'profile' => new AspnetProfileResource($profile)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating profile: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetProfile
     *
     * @method GET
     *
     * Get a specific aspnetprofile
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetprofile to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "profile": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetProfileResource
     */
    public function show(AspnetProfile $aspnetProfile)
    {
        //
    }

    /**
     * @group AspnetProfile
     *
     * @method GET
     *
     * Edit aspnetprofile
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetprofile to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "profile": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetProfileResource
     */
    public function edit(AspnetProfile $aspnetProfile)
    {
        //
    }

    /**
     * @group AspnetProfile
     *
     * @method PUT
     *
     * Update an existing aspnetprofile
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetprofile to update. Example: 1
     *
     * @bodyParam UserId string optional. Maximum length: 255. Example: "Example UserId"
     * @bodyParam PropertyNames string optional. Example: "Example PropertyNames"
     * @bodyParam PropertyValuesString string optional. Example: "Example PropertyValuesString"
     * @bodyParam PropertyValuesBinary string optional. nullable. Example: "Example PropertyValuesBinary"
     * @bodyParam LastUpdatedDate string optional. nullable. date. Example: "Example LastUpdatedDate"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "profile": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetProfileResource
     */
    public function update(UpdateAspnetProfileRequest $request, AspnetProfile $aspnetProfile)
    {
        try {
            $validatedData = $request->validated();

            $updatedProfile = $this->aspnetProfileService->updateProfile($aspnetProfile, $validatedData);

            return $this->successResponse([
                'message' => 'Profile updated successfully',
                'profile' => new AspnetProfileResource($updatedProfile)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating profile: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetProfile
     *
     * @method DELETE
     *
     * Delete a aspnetprofile
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetprofile to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetProfile $aspnetProfile)
    {
        //
    }
}
