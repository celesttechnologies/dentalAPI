<?php

namespace App\Http\Controllers;

use App\Models\EcgExternalRefferalMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EcgExternalRefferalMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EcgExternalRefferalMasterResource;
use App\Http\Requests\StoreEcgExternalRefferalMasterRequest;
use App\Http\Requests\UpdateEcgExternalRefferalMasterRequest;

class EcgExternalRefferalMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private EcgExternalRefferalMasterService $refferalMasterService)
    {
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method GET
     *
     * List all ecgexternalrefferalmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "external_referral_masters": [
     *                 {
     *                     "external_referral_master_id": 1,
     *                     "clinic_id": 1,
     *                     "referral_name": "Example Name",
     *                     "mobile_number": "Example value",
     *                     "country_dial_code": "Example value",
     *                     "description": "Example value",
     *                     "email_id": "user@example.com",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
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

            $data = $this->refferalMasterService->getExternalReferralMasters($perPage);

            return $this->successResponse([
                'external_referral_masters' => EcgExternalRefferalMasterResource::collection($data['external_referral_masters']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG external referral masters: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method GET
     *
     * Create ecgexternalrefferalmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalMaster": {
     *                 "external_referral_master_id": 1,
     *                 "clinic_id": 1,
     *                 "referral_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "country_dial_code": "Example value",
     *                 "description": "Example value",
     *                 "email_id": "user@example.com",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgExternalRefferalMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method POST
     *
     * Create a new ecgexternalrefferalmaster
     *
     * @post /
     *
     * @bodyParam ClinicId string required. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam RefferalName string required. Example: "Example RefferalName"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam CountryDialCode string required. Example: "Example CountryDialCode"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam EmailId string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailId"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalMaster": {
     *                 "external_referral_master_id": 1,
     *                 "clinic_id": 1,
     *                 "referral_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "country_dial_code": "Example value",
     *                 "description": "Example value",
     *                 "email_id": "user@example.com",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
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
     * @return EcgExternalRefferalMasterResource
     */
    public function store(StoreEcgExternalRefferalMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $refferalMaster = $this->refferalMasterService->createRefferalMaster($validatedData);

            return $this->successResponse([
                'message' => 'External refferal master created successfully',
                'refferalMaster' => new EcgExternalRefferalMasterResource($refferalMaster)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating external refferal master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create external refferal master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method GET
     *
     * Get a specific ecgexternalrefferalmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferalmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalMaster": {
     *                 "external_referral_master_id": 1,
     *                 "clinic_id": 1,
     *                 "referral_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "country_dial_code": "Example value",
     *                 "description": "Example value",
     *                 "email_id": "user@example.com",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgExternalRefferalMasterResource
     */
    public function show(EcgExternalRefferalMaster $ecgExternalRefferalMaster)
    {
        //
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method GET
     *
     * Edit ecgexternalrefferalmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferalmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalMaster": {
     *                 "external_referral_master_id": 1,
     *                 "clinic_id": 1,
     *                 "referral_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "country_dial_code": "Example value",
     *                 "description": "Example value",
     *                 "email_id": "user@example.com",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EcgExternalRefferalMasterResource
     */
    public function edit(EcgExternalRefferalMaster $ecgExternalRefferalMaster)
    {
        //
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method PUT
     *
     * Update an existing ecgexternalrefferalmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferalmaster to update. Example: 1
     *
     * @bodyParam ClinicId string optional. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam RefferalName string optional. Example: "Example RefferalName"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam CountryDialCode string optional. Example: "Example CountryDialCode"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam EmailId string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailId"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalMaster": {
     *                 "external_referral_master_id": 1,
     *                 "clinic_id": 1,
     *                 "referral_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "country_dial_code": "Example value",
     *                 "description": "Example value",
     *                 "email_id": "user@example.com",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
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
     * @return EcgExternalRefferalMasterResource
     */
    public function update(UpdateEcgExternalRefferalMasterRequest $request, EcgExternalRefferalMaster $ecgExternalRefferalMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedRefferalMaster = $this->refferalMasterService->updateRefferalMaster($ecgExternalRefferalMaster, $validatedData);

            return $this->successResponse([
                'message' => 'External refferal master updated successfully',
                'refferalMaster' => new EcgExternalRefferalMasterResource($updatedRefferalMaster)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating external refferal master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update external refferal master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgExternalRefferalMaster
     *
     * @method DELETE
     *
     * Delete a ecgexternalrefferalmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferalmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgExternalRefferalMaster $ecgExternalRefferalMaster)
    {
        //
    }
}
