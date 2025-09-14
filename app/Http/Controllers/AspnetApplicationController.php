<?php

namespace App\Http\Controllers;

use App\Models\AspnetApplication;
use Illuminate\Http\Request;
use App\Services\AspnetApplicationService;
use Exception;
use App\Traits\ApiResponse;
use App\Http\Resources\AspnetApplicationResource;
use App\Http\Requests\StoreAspnetApplicationRequest;
use App\Http\Requests\UpdateAspnetApplicationRequest;
use Illuminate\Support\Facades\Log;

class AspnetApplicationController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    protected $aspnetApplicationService;

    public function __construct(AspnetApplicationService $aspnetApplicationService)
    {
        $this->aspnetApplicationService = $aspnetApplicationService;
    }

    /**
     * @group AspnetApplication
     *
     * @method GET
     *
     * List all aspnetapplication
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetApplications": [
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
    public function index()
    {
        try {
            $perPage = env('PAGINATION_LIMIT', 10); // Fetch pagination limit from .env

            // Fetch data from the service
            $aspnetApplications = $this->aspnetApplicationService->getAspnetApplication($perPage);

            // Ensure data is present

            return $this->successResponse(['aspnetApplications' => AspnetApplicationResource::collection($aspnetApplications['application']), 'pagination' => $aspnetApplications['pagination']]);

        } catch (Exception $e) {

            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group AspnetApplication
     *
     * @method GET
     *
     * Create aspnetapplication
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "application": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetApplicationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetApplication
     *
     * @method POST
     *
     * Create a new aspnetapplication
     *
     * @post /
     *
     * @bodyParam ApplicationName string required. Maximum length: 255. Example: "Example ApplicationName"
     * @bodyParam LoweredApplicationName string required. Maximum length: 255. Example: "Example LoweredApplicationName"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "application": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetApplicationResource
     */
    public function store(StoreAspnetApplicationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $application = $this->aspnetApplicationService->createApplication($validatedData);

            return $this->successResponse([
                'message' => 'Application created successfully',
                'application' => new AspnetApplicationResource($application)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating application: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create application',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetApplication
     *
     * @method GET
     *
     * Get a specific aspnetapplication
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetapplication to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "application": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetApplicationResource
     */
    public function show(AspnetApplication $aspnetApplication)
    {
        //
    }

    /**
     * @group AspnetApplication
     *
     * @method GET
     *
     * Edit aspnetapplication
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetapplication to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "application": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetApplicationResource
     */
    public function edit(AspnetApplication $aspnetApplication)
    {
        //
    }

    /**
     * @group AspnetApplication
     *
     * @method PUT
     *
     * Update an existing aspnetapplication
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetapplication to update. Example: 1
     *
     * @bodyParam ApplicationName string optional. Maximum length: 255. Example: "Example ApplicationName"
     * @bodyParam LoweredApplicationName string optional. Maximum length: 255. Example: "Example LoweredApplicationName"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "application": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetApplicationResource
     */
    public function update(UpdateAspnetApplicationRequest $request, AspnetApplication $aspnetApplication)
    {
        try {
            $validatedData = $request->validated();

            $updatedApplication = $this->aspnetApplicationService->updateApplication($aspnetApplication, $validatedData);

            return $this->successResponse([
                'message' => 'Application updated successfully',
                'application' => new AspnetApplicationResource($updatedApplication)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating application: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update application',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetApplication
     *
     * @method DELETE
     *
     * Delete a aspnetapplication
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetapplication to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetApplication $aspnetApplication)
    {
        //
    }
}
