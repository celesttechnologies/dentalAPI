<?php

namespace App\Http\Controllers;

use App\Models\ECGClinicRoleConfiguration;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGClinicRoleConfigurationService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGClinicRoleConfigurationResource;
use App\Http\Requests\StoreECGClinicRoleConfigurationRequest;
use App\Http\Requests\UpdateECGClinicRoleConfigurationRequest;

class ECGClinicRoleConfigurationController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGClinicRoleConfigurationService $configService)
    {
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method GET
     *
     * List all ecgclinicroleconfiguration
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role_configurations": [
     *                 {
     *                     "clinic_role_id": 1,
     *                     "clinic_id": 1,
     *                     "role_id": 1,
     *                     "license_module_code_csv": "Example value",
     *                     "is_administrator_role": true,
     *                     "is_active": true,
     *                     "default_importance": "Example value",
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

            $data = $this->configService->getRoleConfigurations($perPage);

            return $this->successResponse([
                'role_configurations' => ECGClinicRoleConfigurationResource::collection($data['role_configurations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic role configurations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method GET
     *
     * Create ecgclinicroleconfiguration
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "configuration": {
     *                 "clinic_role_id": 1,
     *                 "clinic_id": 1,
     *                 "role_id": 1,
     *                 "license_module_code_csv": "Example value",
     *                 "is_administrator_role": true,
     *                 "is_active": true,
     *                 "default_importance": "Example value",
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
     * @return ECGClinicRoleConfigurationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method POST
     *
     * Create a new ecgclinicroleconfiguration
     *
     * @post /
     *
     * @bodyParam ClinicRoleID string required. Maximum length: 255. Example: "Example ClinicRoleID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam RoleID string required. Maximum length: 255. Example: "Example RoleID"
     * @bodyParam LicenseModuleCodeCSV string optional. nullable. Example: "Example LicenseModuleCodeCSV"
     * @bodyParam IsAdministratorRole boolean optional. nullable. Example: true
     * @bodyParam IsActive boolean optional. nullable. Example: true
     * @bodyParam DefaultImportance number optional. nullable. integer. Example: 1
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "configuration": {
     *                 "clinic_role_id": 1,
     *                 "clinic_id": 1,
     *                 "role_id": 1,
     *                 "license_module_code_csv": "Example value",
     *                 "is_administrator_role": true,
     *                 "is_active": true,
     *                 "default_importance": "Example value",
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
     * @return ECGClinicRoleConfigurationResource
     */
    public function store(StoreECGClinicRoleConfigurationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $configuration = $this->configService->createConfiguration($validatedData);

            return $this->successResponse([
                'message' => 'Clinic role configuration created successfully',
                'configuration' => new ECGClinicRoleConfigurationResource($configuration)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic role configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic role configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method GET
     *
     * Get a specific ecgclinicroleconfiguration
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicroleconfiguration to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "configuration": {
     *                 "clinic_role_id": 1,
     *                 "clinic_id": 1,
     *                 "role_id": 1,
     *                 "license_module_code_csv": "Example value",
     *                 "is_administrator_role": true,
     *                 "is_active": true,
     *                 "default_importance": "Example value",
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
     * @return ECGClinicRoleConfigurationResource
     */
    public function show(ECGClinicRoleConfiguration $eCGClinicRoleConfiguration)
    {
        //
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method GET
     *
     * Edit ecgclinicroleconfiguration
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgclinicroleconfiguration to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "configuration": {
     *                 "clinic_role_id": 1,
     *                 "clinic_id": 1,
     *                 "role_id": 1,
     *                 "license_module_code_csv": "Example value",
     *                 "is_administrator_role": true,
     *                 "is_active": true,
     *                 "default_importance": "Example value",
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
     * @return ECGClinicRoleConfigurationResource
     */
    public function edit(ECGClinicRoleConfiguration $eCGClinicRoleConfiguration)
    {
        //
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method PUT
     *
     * Update an existing ecgclinicroleconfiguration
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicroleconfiguration to update. Example: 1
     *
     * @bodyParam ClinicRoleID string optional. Maximum length: 255. Example: "Example ClinicRoleID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam RoleID string optional. Maximum length: 255. Example: "Example RoleID"
     * @bodyParam LicenseModuleCodeCSV string optional. nullable. Example: "Example LicenseModuleCodeCSV"
     * @bodyParam IsAdministratorRole boolean optional. nullable. Example: true
     * @bodyParam IsActive boolean optional. nullable. Example: true
     * @bodyParam DefaultImportance number optional. nullable. integer. Example: 1
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "configuration": {
     *                 "clinic_role_id": 1,
     *                 "clinic_id": 1,
     *                 "role_id": 1,
     *                 "license_module_code_csv": "Example value",
     *                 "is_administrator_role": true,
     *                 "is_active": true,
     *                 "default_importance": "Example value",
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
     * @return ECGClinicRoleConfigurationResource
     */
    public function update(UpdateECGClinicRoleConfigurationRequest $request, ECGClinicRoleConfiguration $eCGClinicRoleConfiguration)
    {
        try {
            $validatedData = $request->validated();

            $updatedConfiguration = $this->configService->updateConfiguration($eCGClinicRoleConfiguration, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic role configuration updated successfully',
                'configuration' => new ECGClinicRoleConfigurationResource($updatedConfiguration)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic role configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic role configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGClinicRoleConfiguration
     *
     * @method DELETE
     *
     * Delete a ecgclinicroleconfiguration
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicroleconfiguration to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGClinicRoleConfiguration $eCGClinicRoleConfiguration)
    {
        //
    }
}
