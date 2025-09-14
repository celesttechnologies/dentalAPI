<?php

namespace App\Http\Controllers;

use App\Models\EcgExternalRefferalDatum;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EcgExternalRefferalDatumService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EcgExternalRefferalDatumResource;
use App\Http\Requests\StoreEcgExternalRefferalDatumRequest;
use App\Http\Requests\UpdateEcgExternalRefferalDatumRequest;

class EcgExternalRefferalDatumController extends Controller
{
    use ApiResponse;

    public function __construct(private EcgExternalRefferalDatumService $refferalDatumService)
    {
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method GET
     *
     * List all ecgexternalrefferaldatum
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "external_referrals": [
     *                 {
     *                     "external_referral_data_id": 1,
     *                     "external_referral_master_id": 1,
     *                     "patient_id": 1,
     *                     "clinic_id": 1,
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

            $data = $this->refferalDatumService->getExternalReferralData($perPage);

            return $this->successResponse([
                'external_referrals' => EcgExternalRefferalDatumResource::collection($data['external_referrals']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG external referral data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method GET
     *
     * Create ecgexternalrefferaldatum
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalDatum": {
     *                 "external_referral_data_id": 1,
     *                 "external_referral_master_id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
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
     * @return EcgExternalRefferalDatumResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method POST
     *
     * Create a new ecgexternalrefferaldatum
     *
     * @post /
     *
     * @bodyParam ExternalRefferalMasterId string required. Maximum length: 255. Example: "Example ExternalRefferalMasterId"
     * @bodyParam PatientId string required. Maximum length: 255. Example: "Example PatientId"
     * @bodyParam ClinicId string required. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalDatum": {
     *                 "external_referral_data_id": 1,
     *                 "external_referral_master_id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
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
     * @return EcgExternalRefferalDatumResource
     */
    public function store(StoreEcgExternalRefferalDatumRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $refferalDatum = $this->refferalDatumService->createRefferalDatum($validatedData);

            return $this->successResponse([
                'message' => 'External refferal datum created successfully',
                'refferalDatum' => new EcgExternalRefferalDatumResource($refferalDatum)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating external refferal datum: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create external refferal datum',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method GET
     *
     * Get a specific ecgexternalrefferaldatum
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferaldatum to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalDatum": {
     *                 "external_referral_data_id": 1,
     *                 "external_referral_master_id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
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
     * @return EcgExternalRefferalDatumResource
     */
    public function show(EcgExternalRefferalDatum $ecgExternalRefferalDatum)
    {
        //
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method GET
     *
     * Edit ecgexternalrefferaldatum
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferaldatum to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalDatum": {
     *                 "external_referral_data_id": 1,
     *                 "external_referral_master_id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
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
     * @return EcgExternalRefferalDatumResource
     */
    public function edit(EcgExternalRefferalDatum $ecgExternalRefferalDatum)
    {
        //
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method PUT
     *
     * Update an existing ecgexternalrefferaldatum
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferaldatum to update. Example: 1
     *
     * @bodyParam ExternalRefferalMasterId string optional. Maximum length: 255. Example: "Example ExternalRefferalMasterId"
     * @bodyParam PatientId string optional. Maximum length: 255. Example: "Example PatientId"
     * @bodyParam ClinicId string optional. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "refferalDatum": {
     *                 "external_referral_data_id": 1,
     *                 "external_referral_master_id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
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
     * @return EcgExternalRefferalDatumResource
     */
    public function update(UpdateEcgExternalRefferalDatumRequest $request, EcgExternalRefferalDatum $ecgExternalRefferalDatum)
    {
        try {
            $validatedData = $request->validated();

            $updatedRefferalDatum = $this->refferalDatumService->updateRefferalDatum($ecgExternalRefferalDatum, $validatedData);

            return $this->successResponse([
                'message' => 'External refferal datum updated successfully',
                'refferalDatum' => new EcgExternalRefferalDatumResource($updatedRefferalDatum)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating external refferal datum: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update external refferal datum',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EcgExternalRefferalDatum
     *
     * @method DELETE
     *
     * Delete a ecgexternalrefferaldatum
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgexternalrefferaldatum to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgExternalRefferalDatum $ecgExternalRefferalDatum)
    {
        //
    }
}
