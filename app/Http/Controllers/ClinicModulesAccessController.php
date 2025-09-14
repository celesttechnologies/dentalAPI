<?php

namespace App\Http\Controllers;

use App\Models\ClinicModulesAccess;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicModulesAccessService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicModulesAccessResource;
use App\Http\Requests\StoreClinicModulesAccessRequest;
use App\Http\Requests\UpdateClinicModulesAccessRequest;

class ClinicModulesAccessController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicModulesAccessService $clinicModulesAccessService)
    {
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method GET
     *
     * List all clinicmodulesaccess
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "license_module_id": 1,
     *                     "module_code": "Example value",
     *                     "is_licensed": true,
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "row_guid": 1
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

            $data = $this->clinicModulesAccessService->getClinicModulesAccess($perPage);

            return $this->successResponse([
                'clinic_modules_access' => ClinicModulesAccessResource::collection($data['clinic_modules_access']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic modules access: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method GET
     *
     * Create clinicmodulesacce
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "license_module_id": 1,
     *                 "module_code": "Example value",
     *                 "is_licensed": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicModulesAccessResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method POST
     *
     * Create a new clinicmodulesacce
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam LicenseModuleID string required. Maximum length: 255. Example: "Example LicenseModuleID"
     * @bodyParam ModuleCode string required. Example: "Example ModuleCode"
     * @bodyParam IsLicensed string required. Example: "Example IsLicensed"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "license_module_id": 1,
     *                 "module_code": "Example value",
     *                 "is_licensed": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicModulesAccessResource
     */
    public function store(StoreClinicModulesAccessRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $moduleAccess = $this->clinicModulesAccessService->createModulesAccess($validatedData);

            return $this->successResponse([
                'message' => 'Clinic module access created successfully',
                'clinic_modules_access' => new ClinicModulesAccessResource($moduleAccess)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic module access: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic module access',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method GET
     *
     * Get a specific clinicmodulesacce
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinicmodulesaccess to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "license_module_id": 1,
     *                 "module_code": "Example value",
     *                 "is_licensed": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicModulesAccessResource
     */
    public function show(ClinicModulesAccess $clinicModulesAccess)
    {
        //
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method GET
     *
     * Edit clinicmodulesacce
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinicmodulesaccess to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "license_module_id": 1,
     *                 "module_code": "Example value",
     *                 "is_licensed": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicModulesAccessResource
     */
    public function edit(ClinicModulesAccess $clinicModulesAccess)
    {
        //
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method PUT
     *
     * Update an existing clinicmodulesacce
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinicmodulesaccess to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam LicenseModuleID string optional. Maximum length: 255. Example: "Example LicenseModuleID"
     * @bodyParam ModuleCode string optional. Example: "Example ModuleCode"
     * @bodyParam IsLicensed string optional. Example: "Example IsLicensed"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_modules_access": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "license_module_id": 1,
     *                 "module_code": "Example value",
     *                 "is_licensed": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicModulesAccessResource
     */
    public function update(UpdateClinicModulesAccessRequest $request, ClinicModulesAccess $clinicModulesAccess)
    {
        try {
            $validatedData = $request->validated();

            $updatedModuleAccess = $this->clinicModulesAccessService->updateModulesAccess($clinicModulesAccess, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic module access updated successfully',
                'clinic_modules_access' => new ClinicModulesAccessResource($updatedModuleAccess)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic module access: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic module access',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicModulesAccess
     *
     * @method DELETE
     *
     * Delete a clinicmodulesacce
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinicmodulesaccess to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicModulesAccess $clinicModulesAccess)
    {
        //
    }
}
