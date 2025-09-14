<?php

namespace App\Http\Controllers;

use App\Models\PatientAddress;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientAddressService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientAddressResource;
use App\Http\Requests\StorePatientAddressRequest;
use App\Http\Requests\UpdatePatientAddressRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Address
 * @subgroupDescription PatientAddressController handles the CRUD operations for patient addresses.
 */
class PatientAddressController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientAddressService $addressService)
    {
    }

    /**
     * @group PatientAddress
     *
     * @method GET
     *
     * List all patientaddress
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patients": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "address_type": "Example value",
     *                     "address_line1": "Example value",
     *                     "address_line2": "Example value",
     *                     "city": "Example value",
     *                     "state": "Example value",
     *                     "postal_code": "Example value",
     *                     "country": "Example value",
     *                     "is_primary": true,
     *                     "created_at": "2025-05-19 04:57:26",
     *                     "updated_at": "2025-05-19 04:57:26"
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->addressService->getPatients($patient, $perPage);

            return $this->successResponse([
                'patients' => PatientAddressResource::collection($data['patients']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Other Communication Groups: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientAddress
     *
     * @method POST
     *
     * Create a new patientaddre
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam AddressTypeID string required. Maximum length: 255. Example: "Example AddressTypeID"
     * @bodyParam AddressLine1 string required. Example: "Example AddressLine1"
     * @bodyParam AddressLine2 string required. Example: "Example AddressLine2"
     * @bodyParam Street string required. Example: "Example Street"
     * @bodyParam Area string required. Example: "Example Area"
     * @bodyParam City string required. Example: "Example City"
     * @bodyParam State string required. Example: "Example State"
     * @bodyParam Country string required. Example: "Example Country"
     * @bodyParam ZipCode string required. Example: "Example ZipCode"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "address": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "address_type": "Example value",
     *                 "address_line1": "Example value",
     *                 "address_line2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "postal_code": "Example value",
     *                 "country": "Example value",
     *                 "is_primary": true,
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientAddressResource
     */
    public function store(StorePatientAddressRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $address = $this->addressService->createAddress($validatedData);

            return $this->successResponse([
                'message' => 'Patient address created successfully',
                'address' => new PatientAddressResource($address)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient address: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient address',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientAddress
     *
     * @method PUT
     *
     * Update an existing patientaddre
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientaddress to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam AddressTypeID string optional. Maximum length: 255. Example: "Example AddressTypeID"
     * @bodyParam AddressLine1 string optional. Example: "Example AddressLine1"
     * @bodyParam AddressLine2 string optional. Example: "Example AddressLine2"
     * @bodyParam Street string optional. Example: "Example Street"
     * @bodyParam Area string optional. Example: "Example Area"
     * @bodyParam City string optional. Example: "Example City"
     * @bodyParam State string optional. Example: "Example State"
     * @bodyParam Country string optional. Example: "Example Country"
     * @bodyParam ZipCode string optional. Example: "Example ZipCode"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "address": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "address_type": "Example value",
     *                 "address_line1": "Example value",
     *                 "address_line2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "postal_code": "Example value",
     *                 "country": "Example value",
     *                 "is_primary": true,
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientAddressResource
     */
    public function update(UpdatePatientAddressRequest $request, PatientAddress $patientAddress)
    {
        try {
            $validatedData = $request->validated();

            $updatedAddress = $this->addressService->updateAddress($patientAddress, $validatedData);

            return $this->successResponse([
                'message' => 'Patient address updated successfully',
                'address' => new PatientAddressResource($updatedAddress)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient address: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient address',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
