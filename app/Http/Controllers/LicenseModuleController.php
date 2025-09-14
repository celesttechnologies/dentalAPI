<?php

namespace App\Http\Controllers;

use App\Models\LicenseModule;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\LicenseModuleService;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreLicenseModuleRequest;
use App\Http\Requests\UpdateLicenseModuleRequest;
use App\Http\Resources\LicenseModuleResource;

class LicenseModuleController extends Controller
{
    use ApiResponse;

    public function __construct(private LicenseModuleService $moduleService)
    {
    }

    /**
     * @group LicenseModule
     *
     * @method GET
     *
     * List all licensemodule
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_modules": [
     *                 {
     *                     "license_module_id": 1,
     *                     "module_code": "Example value",
     *                     "module_name": "Example Name",
     *                     "module_description": "Example value",
     *                     "order_number": "Example value",
     *                     "prerequisites": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value"
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
            $data = $this->moduleService->getLicenseModules($perPage);

            return $this->successResponse([
                'license_modules' => LicenseModuleResource::collection($data['modules']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching License Modules: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group LicenseModule
     *
     * @method GET
     *
     * Create licensemodule
     *
     * @get /create
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @group LicenseModule
     *
     * @method POST
     *
     * Create a new licensemodule
     *
     * @post /
     *
     * @bodyParam ModuleCode string required. Example: "Example ModuleCode"
     * @bodyParam ModuleName string required. Example: "Example ModuleName"
     * @bodyParam ModuleDescription string required. Example: "Example ModuleDescription"
     * @bodyParam OrderNumber string required. Example: "Example OrderNumber"
     * @bodyParam PreRequisitesCSV string required. Example: "Example PreRequisitesCSV"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLicenseModuleRequest $request)
    {

    }

    /**
     * @group LicenseModule
     *
     * @method GET
     *
     * Get a specific licensemodule
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the licensemodule to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseModule $licenseModule)
    {
        //
    }

    /**
     * @group LicenseModule
     *
     * @method GET
     *
     * Edit licensemodule
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the licensemodule to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(LicenseModule $licenseModule)
    {
        //
    }

    /**
     * @group LicenseModule
     *
     * @method PUT
     *
     * Update an existing licensemodule
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the licensemodule to update. Example: 1
     *
     * @bodyParam ModuleCode string optional. Example: "Example ModuleCode"
     * @bodyParam ModuleName string optional. Example: "Example ModuleName"
     * @bodyParam ModuleDescription string optional. Example: "Example ModuleDescription"
     * @bodyParam OrderNumber string optional. Example: "Example OrderNumber"
     * @bodyParam PreRequisitesCSV string optional. Example: "Example PreRequisitesCSV"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLicenseModuleRequest $request, LicenseModule $licenseModule)
    {

    }

    /**
     * @group LicenseModule
     *
     * @method DELETE
     *
     * Delete a licensemodule
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the licensemodule to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenseModule $licenseModule)
    {
        //
    }
}
