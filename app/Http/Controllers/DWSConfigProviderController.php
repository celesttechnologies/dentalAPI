<?php

namespace App\Http\Controllers;

use App\Models\DWSConfigProvider;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DWSConfigProviderService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DWSConfigProviderResource;
use App\Http\Requests\StoreDWSConfigProviderRequest;
use App\Http\Requests\UpdateDWSConfigProviderRequest;

class DWSConfigProviderController extends Controller
{
    use ApiResponse;

    public function __construct(private DWSConfigProviderService $providerService)
    {
    }

    /**
     * @group DWSConfigProvider
     *
     * @method GET
     *
     * List all dwsconfigprovider
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "providers": [
     *                 {
     *                     "provider_website_id": 1,
     *                     "clinic_website_id": 1,
     *                     "provider_id": 1,
     *                     "provider_name": "Example Name",
     *                     "provider_description": 1,
     *                     "provider_contact_number": 1,
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

            $data = $this->providerService->getProviders($perPage);

            return $this->successResponse([
                'providers' => DWSConfigProviderResource::collection($data['providers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching providers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group DWSConfigProvider
     *
     * @method GET
     *
     * Create dwsconfigprovider
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "provider_website_id": 1,
     *                 "clinic_website_id": 1,
     *                 "provider_id": 1,
     *                 "provider_name": "Example Name",
     *                 "provider_description": 1,
     *                 "provider_contact_number": 1,
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
     * @return DWSConfigProviderResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DWSConfigProvider
     *
     * @method POST
     *
     * Create a new dwsconfigprovider
     *
     * @post /
     *
     * @bodyParam ClinicWebSiteID string required. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ProviderName string required. Maximum length: 255. Example: "1"
     * @bodyParam ProviderDescription string required. Maximum length: 255. Example: "1"
     * @bodyParam ProviderContactNumber string required. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "provider_website_id": 1,
     *                 "clinic_website_id": 1,
     *                 "provider_id": 1,
     *                 "provider_name": "Example Name",
     *                 "provider_description": 1,
     *                 "provider_contact_number": 1,
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
     * @return DWSConfigProviderResource
     */
    public function store(StoreDWSConfigProviderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $provider = $this->providerService->createProvider($validatedData);

            return $this->successResponse([
                'message' => 'Provider created successfully',
                'provider' => new DWSConfigProviderResource($provider)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating provider: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create provider',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigProvider
     *
     * @method GET
     *
     * Get a specific dwsconfigprovider
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigprovider to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "provider_website_id": 1,
     *                 "clinic_website_id": 1,
     *                 "provider_id": 1,
     *                 "provider_name": "Example Name",
     *                 "provider_description": 1,
     *                 "provider_contact_number": 1,
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
     * @return DWSConfigProviderResource
     */
    public function show(DWSConfigProvider $dWSConfigProvider)
    {
        //
    }

    /**
     * @group DWSConfigProvider
     *
     * @method GET
     *
     * Edit dwsconfigprovider
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the dwsconfigprovider to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "provider_website_id": 1,
     *                 "clinic_website_id": 1,
     *                 "provider_id": 1,
     *                 "provider_name": "Example Name",
     *                 "provider_description": 1,
     *                 "provider_contact_number": 1,
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
     * @return DWSConfigProviderResource
     */
    public function edit(DWSConfigProvider $dWSConfigProvider)
    {
        //
    }

    /**
     * @group DWSConfigProvider
     *
     * @method PUT
     *
     * Update an existing dwsconfigprovider
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigprovider to update. Example: 1
     *
     * @bodyParam ClinicWebSiteID string optional. Maximum length: 255. Example: "Example ClinicWebSiteID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ProviderName string optional. Maximum length: 255. Example: "1"
     * @bodyParam ProviderDescription string optional. Maximum length: 255. Example: "1"
     * @bodyParam ProviderContactNumber string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "provider": {
     *                 "provider_website_id": 1,
     *                 "clinic_website_id": 1,
     *                 "provider_id": 1,
     *                 "provider_name": "Example Name",
     *                 "provider_description": 1,
     *                 "provider_contact_number": 1,
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
     * @return DWSConfigProviderResource
     */
    public function update(UpdateDWSConfigProviderRequest $request, DWSConfigProvider $dWSConfigProvider)
    {
        try {
            $validatedData = $request->validated();

            $updatedProvider = $this->providerService->updateProvider($dWSConfigProvider, $validatedData);

            return $this->successResponse([
                'message' => 'Provider updated successfully',
                'provider' => new DWSConfigProviderResource($updatedProvider)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating provider: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update provider',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DWSConfigProvider
     *
     * @method DELETE
     *
     * Delete a dwsconfigprovider
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the dwsconfigprovider to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DWSConfigProvider $dWSConfigProvider)
    {
        //
    }
}
