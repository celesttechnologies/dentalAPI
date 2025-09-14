<?php

namespace App\Http\Controllers;

use App\Models\PatientInvestigation;
use App\Http\Resources\PatientInvestigationResource; // Assuming you have a resource for Patient Investigation
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\PatientInvestigationService;
use App\Http\Requests\StorePatientInvestigationRequest;
use App\Http\Requests\UpdatePatientInvestigationRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Investigation
 * @subgroupDescription PatientInvestigationController handles the CRUD operations for patient investigation controller.
 */
class PatientInvestigationController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientInvestigationService $investigationService)
    {
    }

    /**
     * @group PatientInvestigation
     *
     * @method GET
     *
     * List all patientinvestigation
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "investigations": [
     *                 {
     *                     "ID": "Example value",
     *                     "Date": "Example value",
     *                     "Weight": "Example value",
     *                     "BloodPressure": "Example value",
     *                     "FBS": "Example value",
     *                     "PLBS": "Example value",
     *                     "HbAC": "Example value",
     *                     "LDL": "Example value",
     *                     "ACR": "Example value",
     *                     "Retina": "Example value",
     *                     "Urine": "Example value",
     *                     "Others": "Example value",
     *                     "CustomFields": "Example value",
     *                     "Custom2": "Example value",
     *                     "Custom3": "Example value",
     *                     "Custom4": "Example value",
     *                     "Custom5": "Example value",
     *                     "Custom6": "Example value",
     *                     "Custom7": "Example value",
     *                     "Custom8": "Example value",
     *                     "IsDeleted": "Example value",
     *                     "CreatedBy": "Example value",
     *                     "CreatedOn": "Example value",
     *                     "LastUpdatedBy": "Example value",
     *                     "LastUpdatedOn": "Example value"
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
            $data = $this->investigationService->getInvestigations($patient, $perPage);

            return $this->successResponse([
                'investigations' => PatientInvestigationResource::collection($data['investigations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Investigations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',

            ]);
        }
    }

    /**
     * @group PatientInvestigation
     *
     * @method POST
     *
     * Create a new patientinvestigation
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfInvestigation string required. date. Example: "Example DateOfInvestigation"
     * @bodyParam Weight string required. Example: "Example Weight"
     * @bodyParam BloodPressure string required. Example: "Example BloodPressure"
     * @bodyParam FBS string required. Example: "Example FBS"
     * @bodyParam PLBS string required. Example: "Example PLBS"
     * @bodyParam HbAC string required. Example: "Example HbAC"
     * @bodyParam LDL string required. Example: "Example LDL"
     * @bodyParam ACR string required. Example: "Example ACR"
     * @bodyParam Retina string required. Example: "Example Retina"
     * @bodyParam Urine string required. Example: "Example Urine"
     * @bodyParam Others string required. Example: "Example Others"
     * @bodyParam Custom1 string required. Example: "Example Custom1"
     * @bodyParam Custom2 string required. Example: "Example Custom2"
     * @bodyParam Custom3 string required. Example: "Example Custom3"
     * @bodyParam Custom4 string required. Example: "Example Custom4"
     * @bodyParam Custom5 string required. Example: "Example Custom5"
     * @bodyParam Custom6 string required. Example: "Example Custom6"
     * @bodyParam Custom7 string required. Example: "Example Custom7"
     * @bodyParam Custom8 string required. Example: "Example Custom8"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "investigation": {
     *                 "ID": "Example value",
     *                 "Date": "Example value",
     *                 "Weight": "Example value",
     *                 "BloodPressure": "Example value",
     *                 "FBS": "Example value",
     *                 "PLBS": "Example value",
     *                 "HbAC": "Example value",
     *                 "LDL": "Example value",
     *                 "ACR": "Example value",
     *                 "Retina": "Example value",
     *                 "Urine": "Example value",
     *                 "Others": "Example value",
     *                 "CustomFields": "Example value",
     *                 "Custom2": "Example value",
     *                 "Custom3": "Example value",
     *                 "Custom4": "Example value",
     *                 "Custom5": "Example value",
     *                 "Custom6": "Example value",
     *                 "Custom7": "Example value",
     *                 "Custom8": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "CreatedBy": "Example value",
     *                 "CreatedOn": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientInvestigationResource
     */
    public function store(StorePatientInvestigationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $investigation = $this->investigationService->createInvestigation($validatedData);

            return $this->successResponse([
                'message' => 'Patient investigation created successfully',
                'investigation' => new PatientInvestigationResource($investigation)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient investigation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient investigation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientInvestigation
     *
     * @method PUT
     *
     * Update an existing patientinvestigation
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientinvestigation to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfInvestigation string optional. date. Example: "Example DateOfInvestigation"
     * @bodyParam Weight string optional. Example: "Example Weight"
     * @bodyParam BloodPressure string optional. Example: "Example BloodPressure"
     * @bodyParam FBS string optional. Example: "Example FBS"
     * @bodyParam PLBS string optional. Example: "Example PLBS"
     * @bodyParam HbAC string optional. Example: "Example HbAC"
     * @bodyParam LDL string optional. Example: "Example LDL"
     * @bodyParam ACR string optional. Example: "Example ACR"
     * @bodyParam Retina string optional. Example: "Example Retina"
     * @bodyParam Urine string optional. Example: "Example Urine"
     * @bodyParam Others string optional. Example: "Example Others"
     * @bodyParam Custom1 string optional. Example: "Example Custom1"
     * @bodyParam Custom2 string optional. Example: "Example Custom2"
     * @bodyParam Custom3 string optional. Example: "Example Custom3"
     * @bodyParam Custom4 string optional. Example: "Example Custom4"
     * @bodyParam Custom5 string optional. Example: "Example Custom5"
     * @bodyParam Custom6 string optional. Example: "Example Custom6"
     * @bodyParam Custom7 string optional. Example: "Example Custom7"
     * @bodyParam Custom8 string optional. Example: "Example Custom8"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "investigation": {
     *                 "ID": "Example value",
     *                 "Date": "Example value",
     *                 "Weight": "Example value",
     *                 "BloodPressure": "Example value",
     *                 "FBS": "Example value",
     *                 "PLBS": "Example value",
     *                 "HbAC": "Example value",
     *                 "LDL": "Example value",
     *                 "ACR": "Example value",
     *                 "Retina": "Example value",
     *                 "Urine": "Example value",
     *                 "Others": "Example value",
     *                 "CustomFields": "Example value",
     *                 "Custom2": "Example value",
     *                 "Custom3": "Example value",
     *                 "Custom4": "Example value",
     *                 "Custom5": "Example value",
     *                 "Custom6": "Example value",
     *                 "Custom7": "Example value",
     *                 "Custom8": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "CreatedBy": "Example value",
     *                 "CreatedOn": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientInvestigationResource
     */
    public function update(UpdatePatientInvestigationRequest $request, PatientInvestigation $patientInvestigation)
    {
        try {
            $validatedData = $request->validated();

            $updatedInvestigation = $this->investigationService->updateInvestigation($patientInvestigation, $validatedData);

            return $this->successResponse([
                'message' => 'Patient investigation updated successfully',
                'investigation' => new PatientInvestigationResource($updatedInvestigation)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient investigation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient investigation',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
