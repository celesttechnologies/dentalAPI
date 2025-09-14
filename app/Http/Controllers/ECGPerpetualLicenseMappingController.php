<?php

namespace App\Http\Controllers;

use App\Models\ECGPerpetualLicenseMapping;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGPerpetualLicenseMappingService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGPerpetualLicenseMappingResource;
use App\Http\Requests\StoreECGPerpetualLicenseMappingRequest;
use App\Http\Requests\UpdateECGPerpetualLicenseMappingRequest;

class ECGPerpetualLicenseMappingController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGPerpetualLicenseMappingService $licenseMappingService)
    {
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method GET
     *
     * List all ecgperpetuallicensemapping
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mappings": [
     *                 {
     *                     "clinic_license_id": 1,
     *                     "clinic_name": "Example Name",
     *                     "email_address": "user@example.com",
     *                     "mobile_number": "Example value",
     *                     "license_key": "Example value",
     *                     "finger_print_code": "Example value",
     *                     "is_active": true,
     *                     "license_valid_till": 1,
     *                     "license_last_synced_on": "Example value",
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

            $data = $this->licenseMappingService->getLicenseMappings($perPage);

            return $this->successResponse([
                'license_mappings' => ECGPerpetualLicenseMappingResource::collection($data['license_mappings']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG Perpetual License Mappings: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method GET
     *
     * Create ecgperpetuallicensemapping
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mapping": {
     *                 "clinic_license_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "email_address": "user@example.com",
     *                 "mobile_number": "Example value",
     *                 "license_key": "Example value",
     *                 "finger_print_code": "Example value",
     *                 "is_active": true,
     *                 "license_valid_till": 1,
     *                 "license_last_synced_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMappingResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method POST
     *
     * Create a new ecgperpetuallicensemapping
     *
     * @post /
     *
     * @bodyParam ClinicName string required. Example: "Example ClinicName"
     * @bodyParam EmailAddress string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam LicenseKey string required. Example: "Example LicenseKey"
     * @bodyParam FingerPrintCode string required. Example: "Example FingerPrintCode"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam LicenseValidTill string required. Maximum length: 255. Example: "1"
     * @bodyParam LicenseLastSyncedOn string required. Example: "Example LicenseLastSyncedOn"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mapping": {
     *                 "clinic_license_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "email_address": "user@example.com",
     *                 "mobile_number": "Example value",
     *                 "license_key": "Example value",
     *                 "finger_print_code": "Example value",
     *                 "is_active": true,
     *                 "license_valid_till": 1,
     *                 "license_last_synced_on": "Example value",
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
     * @return ECGPerpetualLicenseMappingResource
     */
    public function store(StoreECGPerpetualLicenseMappingRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $licenseMapping = $this->licenseMappingService->createLicenseMapping($validatedData);

            return $this->successResponse([
                'message' => 'ECG Perpetual License Mapping created successfully',
                'license_mapping' => new ECGPerpetualLicenseMappingResource($licenseMapping)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating ECG Perpetual License Mapping: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create ECG Perpetual License Mapping',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method GET
     *
     * Get a specific ecgperpetuallicensemapping
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemapping to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mapping": {
     *                 "clinic_license_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "email_address": "user@example.com",
     *                 "mobile_number": "Example value",
     *                 "license_key": "Example value",
     *                 "finger_print_code": "Example value",
     *                 "is_active": true,
     *                 "license_valid_till": 1,
     *                 "license_last_synced_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMappingResource
     */
    public function show(ECGPerpetualLicenseMapping $eCGPerpetualLicenseMapping)
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method GET
     *
     * Edit ecgperpetuallicensemapping
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemapping to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mapping": {
     *                 "clinic_license_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "email_address": "user@example.com",
     *                 "mobile_number": "Example value",
     *                 "license_key": "Example value",
     *                 "finger_print_code": "Example value",
     *                 "is_active": true,
     *                 "license_valid_till": 1,
     *                 "license_last_synced_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGPerpetualLicenseMappingResource
     */
    public function edit(ECGPerpetualLicenseMapping $eCGPerpetualLicenseMapping)
    {
        //
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method PUT
     *
     * Update an existing ecgperpetuallicensemapping
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemapping to update. Example: 1
     *
     * @bodyParam ClinicName string optional. Example: "Example ClinicName"
     * @bodyParam EmailAddress string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailAddress"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam LicenseKey string optional. Example: "Example LicenseKey"
     * @bodyParam FingerPrintCode string optional. Example: "Example FingerPrintCode"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam LicenseValidTill string optional. Maximum length: 255. Example: "1"
     * @bodyParam LicenseLastSyncedOn string optional. Example: "Example LicenseLastSyncedOn"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "license_mapping": {
     *                 "clinic_license_id": 1,
     *                 "clinic_name": "Example Name",
     *                 "email_address": "user@example.com",
     *                 "mobile_number": "Example value",
     *                 "license_key": "Example value",
     *                 "finger_print_code": "Example value",
     *                 "is_active": true,
     *                 "license_valid_till": 1,
     *                 "license_last_synced_on": "Example value",
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
     * @return ECGPerpetualLicenseMappingResource
     */
    public function update(UpdateECGPerpetualLicenseMappingRequest $request, ECGPerpetualLicenseMapping $eCGPerpetualLicenseMapping)
    {
        try {
            $validatedData = $request->validated();

            $updatedLicenseMapping = $this->licenseMappingService->updateLicenseMapping($eCGPerpetualLicenseMapping, $validatedData);

            return $this->successResponse([
                'message' => 'ECG Perpetual License Mapping updated successfully',
                'license_mapping' => new ECGPerpetualLicenseMappingResource($updatedLicenseMapping)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating ECG Perpetual License Mapping: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update ECG Perpetual License Mapping',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGPerpetualLicenseMapping
     *
     * @method DELETE
     *
     * Delete a ecgperpetuallicensemapping
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgperpetuallicensemapping to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGPerpetualLicenseMapping $eCGPerpetualLicenseMapping)
    {
        //
    }
}
