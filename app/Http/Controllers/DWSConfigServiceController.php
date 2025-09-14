<?php

namespace App\Http\Controllers;

use App\Models\DWSConfigService;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSConfigServiceService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DWSConfigServiceResource;
use App\Http\Requests\StoreDWSConfigServiceRequest;
use App\Http\Requests\UpdateDWSConfigServiceRequest;

class DWSConfigServiceController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSConfigServiceService $serviceService)
    {
    }

    /**
     * @group DWSConfigService
     *
     * @method GET
     *
     * List all dwsconfigservice
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "services": [
     *                 {
     *                     "service_id": 1,
     *                     "clinic_website_id": 1,
     *                     "service_name": "Example Name",
     *                     "service_description": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->serviceService->getServices($perPage);

            return $this->successResponse([
                'services' => DWSConfigServiceResource::collection($data['services']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching services: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group DWSConfigService
     *
     * @method GET
     *
     * Create dwsconfigservice
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "service": {
     *                 "service_id": 1,
     *                 "clinic_website_id": 1,
     *                 "service_name": "Example Name",
     *                 "service_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigServiceResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSConfigService
     *
     * @method POST
     *
     * Create a new dwsconfigservice
     *
     * @post /
     *
     * @bodyParam ClinicWebSiteID string required. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam ServiceName string required. Example: "Example ServiceName"
     * @bodyParam ServiceDescription string required. Example: "Example ServiceDescription"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "service": {
     *                 "service_id": 1,
     *                 "clinic_website_id": 1,
     *                 "service_name": "Example Name",
     *                 "service_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigServiceResource
     */
    public function store(StoreDWSConfigServiceRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $service = $this->serviceService->createService($validatedData);

            return $this->successResponse([
                'message' => 'Service configuration created successfully',
                'service' => new DWSConfigServiceResource($service)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating service configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create service configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigService
     *
     * @method GET
     *
     * Get a specific dwsconfigservice
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigservice to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "service": {
     *                 "service_id": 1,
     *                 "clinic_website_id": 1,
     *                 "service_name": "Example Name",
     *                 "service_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigServiceResource
     */
    public function show(DWSConfigService $dWSConfigService)
    {
        //
    }

    /**
     * @group DWSConfigService
     *
     * @method GET
     *
     * Edit dwsconfigservice
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwsconfigservice to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "service": {
     *                 "service_id": 1,
     *                 "clinic_website_id": 1,
     *                 "service_name": "Example Name",
     *                 "service_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigServiceResource
     */
    public function edit(DWSConfigService $dWSConfigService)
    {
        //
    }

    /**
     * @group DWSConfigService
     *
     * @method PUT
     *
     * Update an existing dwsconfigservice
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigservice to update. Example: 1
     *
     * @bodyParam ClinicWebSiteID string optional. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam ServiceName string optional. Example: "Example ServiceName"
     * @bodyParam ServiceDescription string optional. Example: "Example ServiceDescription"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "service": {
     *                 "service_id": 1,
     *                 "clinic_website_id": 1,
     *                 "service_name": "Example Name",
     *                 "service_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DWSConfigServiceResource
     */
    public function update(UpdateDWSConfigServiceRequest $request, DWSConfigService $dWSConfigService)
    {
        try {
            $validatedData = $request->validated();

            $updatedService = $this->serviceService->updateService($dWSConfigService, $validatedData);

            return $this->successResponse([
                'message' => 'Service configuration updated successfully',
                'service' => new DWSConfigServiceResource($updatedService)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating service configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update service configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigService
     *
     * @method DELETE
     *
     * Delete a dwsconfigservice
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigservice to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSConfigService $dWSConfigService)
    {
        //
    }
}
