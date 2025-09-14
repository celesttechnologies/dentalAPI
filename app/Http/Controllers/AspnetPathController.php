<?php

namespace App\Http\Controllers;

use App\Models\AspnetPath;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\AspnetPathService;
use App\Http\Resources\AspnetPathResource;
use App\Http\Requests\StoreAspnetPathRequest;
use App\Http\Requests\UpdateAspnetPathRequest;
use Illuminate\Support\Facades\Log;

class AspnetPathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponse;

    public function __construct(
        private AspnetPathService $aspnetPathService
    ) {

    }

    /**
     * @group AspnetPath
     *
     * @method GET
     *
     * List all aspnetpath
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "aspnetPathService": [
     *                 {
     *                     "id": 1,
     *                     "path_id": 1,
     *                     "path": "Example value",
     *                     "lowered_path": "Example value"
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

            $aspnetPathServiceList = $this->aspnetPathService->getaspnetPathService($perPage);

            return $this->successResponse(['aspnetPathService' => AspnetPathResource::collection($aspnetPathServiceList['aspnetPathService']), 'pagination' =>  $aspnetPathServiceList['pagination']]);
        } catch (Exception $e) {
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        };
    }

    /**
     * @group AspnetPath
     *
     * @method GET
     *
     * Create aspnetpath
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "path": {
     *                 "id": 1,
     *                 "path_id": 1,
     *                 "path": "Example value",
     *                 "lowered_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPathResource
     */
    public function create()
    {
        //
    }

    /**
     * @group AspnetPath
     *
     * @method POST
     *
     * Create a new aspnetpath
     *
     * @post /
     *
     * @bodyParam PathId string required. Maximum length: 255. Example: "Example PathId"
     * @bodyParam ApplicationId string required. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam Path string required. Maximum length: 500. Example: "Example Path"
     * @bodyParam LoweredPath string required. Maximum length: 500. Example: "Example LoweredPath"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "path": {
     *                 "id": 1,
     *                 "path_id": 1,
     *                 "path": "Example value",
     *                 "lowered_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPathResource
     */
    public function store(StoreAspnetPathRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $path = $this->aspnetPathService->createPath($validatedData);

            return $this->successResponse([
                'message' => 'Path created successfully',
                'path' => new AspnetPathResource($path)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating path: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create path',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPath
     *
     * @method GET
     *
     * Get a specific aspnetpath
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpath to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "path": {
     *                 "id": 1,
     *                 "path_id": 1,
     *                 "path": "Example value",
     *                 "lowered_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPathResource
     */
    public function show(AspnetPath $aspnetPath)
    {
        //
    }

    /**
     * @group AspnetPath
     *
     * @method GET
     *
     * Edit aspnetpath
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the aspnetpath to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "path": {
     *                 "id": 1,
     *                 "path_id": 1,
     *                 "path": "Example value",
     *                 "lowered_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPathResource
     */
    public function edit(AspnetPath $aspnetPath)
    {
        //
    }

    /**
     * @group AspnetPath
     *
     * @method PUT
     *
     * Update an existing aspnetpath
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpath to update. Example: 1
     *
     * @bodyParam PathId string optional. Maximum length: 255. Example: "Example PathId"
     * @bodyParam ApplicationId string optional. Maximum length: 255. Example: "Example ApplicationId"
     * @bodyParam Path string optional. Maximum length: 500. Example: "Example Path"
     * @bodyParam LoweredPath string optional. Maximum length: 500. Example: "Example LoweredPath"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "path": {
     *                 "id": 1,
     *                 "path_id": 1,
     *                 "path": "Example value",
     *                 "lowered_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return AspnetPathResource
     */
    public function update(UpdateAspnetPathRequest $request, AspnetPath $aspnetPath)
    {
        try {
            $validatedData = $request->validated();

            $updatedPath = $this->aspnetPathService->updatePath($aspnetPath, $validatedData);

            return $this->successResponse([
                'message' => 'Path updated successfully',
                'path' => new AspnetPathResource($updatedPath)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating path: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update path',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group AspnetPath
     *
     * @method DELETE
     *
     * Delete a aspnetpath
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the aspnetpath to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AspnetPath $aspnetPath)
    {
        //
    }
}
