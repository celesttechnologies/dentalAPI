<?php

namespace App\Http\Controllers;

use App\Models\ECGPerpetualLicenseMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGPerpetualLicenseMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGPerpetualLicenseMasterResource;
use App\Http\Requests\StoreECGPerpetualLicenseMasterRequest;
use App\Http\Requests\UpdateECGPerpetualLicenseMasterRequest;

class ECGPerpetualLicenseMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGPerpetualLicenseMasterService $licenseService)
    {
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method GET
     *
     * List all ecgperpetuallicensemaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_masters": [
     *                 {
     *                     "license_id": 1,
     *                     "license_key": "Example value",
     *                     "license_type_id": 1,
     *                     "license_created_date": "Example value",
     *                     "license_activated_on": "Example value",
     *                     "license_validity_type_id": 1,
     *                     "license_deactivated_on": "Example value",
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

            $data = $this->licenseService->getLicenseMasters($perPage);

            return $this->successResponse([
                'license_masters' => ECGPerpetualLicenseMasterResource::collection($data['license_masters']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG Perpetual License Masters: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method GET
     *
     * Create ecgperpetuallicensemaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license": {
     *                 "license_id": 1,
     *                 "license_key": "Example value",
     *                 "license_type_id": 1,
     *                 "license_created_date": "Example value",
     *                 "license_activated_on": "Example value",
     *                 "license_validity_type_id": 1,
     *                 "license_deactivated_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method POST
     *
     * Create a new ecgperpetuallicensemaster
     *
     * @post /
     *
     * @bodyParam LicenseKey string required. Example: "Example LicenseKey"
     * @bodyParam LicenseTypeID string required. Maximum length: 255. Example: "Example LicenseTypeID"
     * @bodyParam LicenseCreatedDate string required. date. Example: "Example LicenseCreatedDate"
     * @bodyParam LicenseActivatedOn string required. Example: "Example LicenseActivatedOn"
     * @bodyParam LicenseValidityTypeID string required. Maximum length: 255. Example: "1"
     * @bodyParam LicenseDeactivatedOn string required. Example: "Example LicenseDeactivatedOn"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "license": {
     *                 "license_id": 1,
     *                 "license_key": "Example value",
     *                 "license_type_id": 1,
     *                 "license_created_date": "Example value",
     *                 "license_activated_on": "Example value",
     *                 "license_validity_type_id": 1,
     *                 "license_deactivated_on": "Example value",
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
     * @return ECGPerpetualLicenseMasterResource
     */
    public function store(StoreECGPerpetualLicenseMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $license = $this->licenseService->createLicense($validatedData);

            return $this->successResponse([
                'message' => 'Perpetual license created successfully',
                'license' => new ECGPerpetualLicenseMasterResource($license)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating perpetual license: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create perpetual license',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method GET
     *
     * Get a specific ecgperpetuallicensemaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license": {
     *                 "license_id": 1,
     *                 "license_key": "Example value",
     *                 "license_type_id": 1,
     *                 "license_created_date": "Example value",
     *                 "license_activated_on": "Example value",
     *                 "license_validity_type_id": 1,
     *                 "license_deactivated_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMasterResource
     */
    public function show(ECGPerpetualLicenseMaster $eCGPerpetualLicenseMaster)
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method GET
     *
     * Edit ecgperpetuallicensemaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license": {
     *                 "license_id": 1,
     *                 "license_key": "Example value",
     *                 "license_type_id": 1,
     *                 "license_created_date": "Example value",
     *                 "license_activated_on": "Example value",
     *                 "license_validity_type_id": 1,
     *                 "license_deactivated_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMasterResource
     */
    public function edit(ECGPerpetualLicenseMaster $eCGPerpetualLicenseMaster)
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method PUT
     *
     * Update an existing ecgperpetuallicensemaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemaster to update. Example: 1
     *
     * @bodyParam LicenseKey string optional. Example: "Example LicenseKey"
     * @bodyParam LicenseTypeID string optional. Maximum length: 255. Example: "Example LicenseTypeID"
     * @bodyParam LicenseCreatedDate string optional. date. Example: "Example LicenseCreatedDate"
     * @bodyParam LicenseActivatedOn string optional. Example: "Example LicenseActivatedOn"
     * @bodyParam LicenseValidityTypeID string optional. Maximum length: 255. Example: "1"
     * @bodyParam LicenseDeactivatedOn string optional. Example: "Example LicenseDeactivatedOn"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license": {
     *                 "license_id": 1,
     *                 "license_key": "Example value",
     *                 "license_type_id": 1,
     *                 "license_created_date": "Example value",
     *                 "license_activated_on": "Example value",
     *                 "license_validity_type_id": 1,
     *                 "license_deactivated_on": "Example value",
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
     * @return ECGPerpetualLicenseMasterResource
     */
    public function update(UpdateECGPerpetualLicenseMasterRequest $request, ECGPerpetualLicenseMaster $eCGPerpetualLicenseMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedLicense = $this->licenseService->updateLicense($eCGPerpetualLicenseMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Perpetual license updated successfully',
                'license' => new ECGPerpetualLicenseMasterResource($updatedLicense)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating perpetual license: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update perpetual license',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGPerpetualLicenseMaster
     *
     * @method DELETE
     *
     * Delete a ecgperpetuallicensemaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGPerpetualLicenseMaster $eCGPerpetualLicenseMaster)
    {
        //
    }
}
