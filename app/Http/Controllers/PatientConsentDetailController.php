<?php

namespace App\Http\Controllers;

use App\Models\PatientConsentDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientConsentDetailService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientConsentDetailResource;
use App\Http\Requests\StorePatientConsentDetailRequest;
use App\Http\Requests\UpdatePatientConsentDetailRequest;

/**
 * @group Patient
 * @subgroup Patient Consent Detail
 * @subgroupDescription PatientConsentDetailController handles the CRUD operations for patient consent detail controller.
 */
class PatientConsentDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientConsentDetailService $consentService)
    {
    }

    /**
     * @group PatientConsentDetail
     *
     * @method GET
     *
     * List all patientconsentdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "consentDetail": {
     *                 "ID": "Example value",
     *                 "TypeID": "Example value",
     *                 "Date": "Example value",
     *                 "CPName": "Example value",
     *                 "CPRelation": "Example value",
     *                 "CPContact": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "ProcedureTypeID": "Example value",
     *                 "ProcedureName": "Example value",
     *                 "CreatedOn": "Example value",
     *                 "CreatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientConsentDetailResource
     */
    public function index()
    {
        //
    }

    /**
     * @group PatientConsentDetail
     *
     * @method POST
     *
     * Create a new patientconsentdetail
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ConsentTypeID string required. Maximum length: 255. Example: "Example ConsentTypeID"
     * @bodyParam ConsentDate string required. date. Example: "Example ConsentDate"
     * @bodyParam CPName string required. Example: "Example CPName"
     * @bodyParam CPRelation string required. Example: "Example CPRelation"
     * @bodyParam CPContact string required. Example: "Example CPContact"
     * @bodyParam Advance string required. Example: "Example Advance"
     * @bodyParam Total string required. Example: "Example Total"
     * @bodyParam Installment string required. Example: "Example Installment"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam ProcedureTypeID string required. Maximum length: 255. Example: "Example ProcedureTypeID"
     * @bodyParam ProcedureName string required. Example: "Example ProcedureName"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "consentDetail": {
     *                 "ID": "Example value",
     *                 "TypeID": "Example value",
     *                 "Date": "Example value",
     *                 "CPName": "Example value",
     *                 "CPRelation": "Example value",
     *                 "CPContact": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "ProcedureTypeID": "Example value",
     *                 "ProcedureName": "Example value",
     *                 "CreatedOn": "Example value",
     *                 "CreatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientConsentDetailResource
     */
    public function store(StorePatientConsentDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $consentDetail = $this->consentService->createConsentDetail($validatedData);

            return $this->successResponse([
                'message' => 'Patient consent detail created successfully',
                'consentDetail' => new PatientConsentDetailResource($consentDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient consent detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient consent detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientConsentDetail
     *
     * @method PUT
     *
     * Update an existing patientconsentdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientconsentdetail to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ConsentTypeID string optional. Maximum length: 255. Example: "Example ConsentTypeID"
     * @bodyParam ConsentDate string optional. date. Example: "Example ConsentDate"
     * @bodyParam CPName string optional. Example: "Example CPName"
     * @bodyParam CPRelation string optional. Example: "Example CPRelation"
     * @bodyParam CPContact string optional. Example: "Example CPContact"
     * @bodyParam Advance string optional. Example: "Example Advance"
     * @bodyParam Total string optional. Example: "Example Total"
     * @bodyParam Installment string optional. Example: "Example Installment"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam ProcedureTypeID string optional. Maximum length: 255. Example: "Example ProcedureTypeID"
     * @bodyParam ProcedureName string optional. Example: "Example ProcedureName"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "consentDetail": {
     *                 "ID": "Example value",
     *                 "TypeID": "Example value",
     *                 "Date": "Example value",
     *                 "CPName": "Example value",
     *                 "CPRelation": "Example value",
     *                 "CPContact": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "ProcedureTypeID": "Example value",
     *                 "ProcedureName": "Example value",
     *                 "CreatedOn": "Example value",
     *                 "CreatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "LastUpdatedBy": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientConsentDetailResource
     */
    public function update(UpdatePatientConsentDetailRequest $request, PatientConsentDetail $patientConsentDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedConsentDetail = $this->consentService->updateConsentDetail($patientConsentDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Patient consent detail updated successfully',
                'consentDetail' => new PatientConsentDetailResource($updatedConsentDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient consent detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient consent detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
