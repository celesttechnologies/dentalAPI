<?php

namespace App\Http\Controllers;

use App\Models\ECGMRoleConfiguration;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGMRoleConfigurationService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGMRoleConfigurationResource;
use App\Http\Requests\StoreECGMRoleConfigurationRequest;
use App\Http\Requests\UpdateECGMRoleConfigurationRequest;

class ECGMRoleConfigurationController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGMRoleConfigurationService $roleConfigService)
    {
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method GET
     *
     * List all ecgmroleconfiguration
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "role_configurations": [
     *                 {
     *                     "clinic_role_id": 1,
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

            $data = $this->roleConfigService->getRoleConfigurations($perPage);

            return $this->successResponse([
                'role_configurations' => ECGMRoleConfigurationResource::collection($data['role_configurations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECGM role configurations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method GET
     *
     * Create ecgmroleconfiguration
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "roleConfiguration": {
     *                 "clinic_role_id": 1,
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
     * @return ECGMRoleConfigurationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method POST
     *
     * Create a new ecgmroleconfiguration
     *
     * @post /
     *
     * @bodyParam ClinicRoleID string required. Maximum length: 255. Example: "Example ClinicRoleID"
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
     *             "roleConfiguration": {
     *                 "clinic_role_id": 1,
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
     * @return ECGMRoleConfigurationResource
     */
    public function store(StoreECGMRoleConfigurationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $roleConfig = $this->roleConfigService->createRoleConfiguration($validatedData);

            return $this->successResponse([
                'message' => 'Role configuration created successfully',
                'roleConfiguration' => new ECGMRoleConfigurationResource($roleConfig)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating role configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create role configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method GET
     *
     * Get a specific ecgmroleconfiguration
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgmroleconfiguration to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "roleConfiguration": {
     *                 "clinic_role_id": 1,
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
     * @return ECGMRoleConfigurationResource
     */
    public function show(ECGMRoleConfiguration $eCGMRoleConfiguration)
    {
        //
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method GET
     *
     * Edit ecgmroleconfiguration
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgmroleconfiguration to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "roleConfiguration": {
     *                 "clinic_role_id": 1,
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
     * @return ECGMRoleConfigurationResource
     */
    public function edit(ECGMRoleConfiguration $eCGMRoleConfiguration)
    {
        //
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method PUT
     *
     * Update an existing ecgmroleconfiguration
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgmroleconfiguration to update. Example: 1
     *
     * @bodyParam ClinicRoleID string optional. Maximum length: 255. Example: "Example ClinicRoleID"
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
     *             "roleConfiguration": {
     *                 "clinic_role_id": 1,
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
     * @return ECGMRoleConfigurationResource
     */
    public function update(UpdateECGMRoleConfigurationRequest $request, ECGMRoleConfiguration $eCGMRoleConfiguration)
    {
        try {
            $validatedData = $request->validated();

            $updatedRoleConfig = $this->roleConfigService->updateRoleConfiguration($eCGMRoleConfiguration, $validatedData);

            return $this->successResponse([
                'message' => 'Role configuration updated successfully',
                'roleConfiguration' => new ECGMRoleConfigurationResource($updatedRoleConfig)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating role configuration: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update role configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGMRoleConfiguration
     *
     * @method DELETE
     *
     * Delete a ecgmroleconfiguration
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgmroleconfiguration to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGMRoleConfiguration $eCGMRoleConfiguration)
    {
        //
    }
}
