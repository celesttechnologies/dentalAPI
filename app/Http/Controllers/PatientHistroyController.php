<?php

namespace App\Http\Controllers;

use App\Models\PatientHistory as PatientHistroy;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use App\Services\PatientHistoryService; // Import the service
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePatientHistoryRequest;
use App\Http\Requests\UpdatePatientHistoryRequest;
use App\Http\Resources\PatientHistoryResource;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup History
 * @subgroupDescription PatientHistroyController handles the CRUD operations for patient history controller.
 */
class PatientHistroyController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientHistoryService $historyService)
    {
    }

    /**
     * @group PatientHistroy
     *
     * @method GET
     *
     * List all patienthistroy
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->historyService->getHistories($patient, $perPage);

            return $this->successResponse([
                'histories' => $data['histories'],
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Histories: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientHistroy
     *
     * @method POST
     *
     * Create a new patienthistroy
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientDiagnosisID string required. Maximum length: 255. Example: "Example PatientDiagnosisID"
     * @bodyParam TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam DateOfHistroy string required. date. Example: "Example DateOfHistroy"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam TeethTreatments string required. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "history": {
     *                 "patient_id": 1,
     *                 "diagnosis_id": 1,
     *                 "treatment_type_id": 1,
     *                 "date_of_history": "Example value",
     *                 "description": "Example value",
     *                 "teeth_treatments": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "provider_id": 1,
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientHistoryResource
     */
    public function store(StorePatientHistoryRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $history = $this->historyService->createHistory($validatedData);

            return $this->successResponse([
                'message' => 'Patient history created successfully',
                'history' => new PatientHistoryResource($history)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient history: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient history',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientHistroy
     *
     * @method PUT
     *
     * Update an existing patienthistroy
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienthistroy to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam PatientDiagnosisID string optional. Maximum length: 255. Example: "Example PatientDiagnosisID"
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam DateOfHistroy string optional. date. Example: "Example DateOfHistroy"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam TeethTreatments string optional. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "history": {
     *                 "patient_id": 1,
     *                 "diagnosis_id": 1,
     *                 "treatment_type_id": 1,
     *                 "date_of_history": "Example value",
     *                 "description": "Example value",
     *                 "teeth_treatments": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "provider_id": 1,
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
     * @return PatientHistoryResource
     */
    public function update(UpdatePatientHistoryRequest $request, PatientHistroy $patientHistroy)
    {
        try {
            $validatedData = $request->validated();

            $updatedHistory = $this->historyService->updateHistory($patientHistroy, $validatedData);

            return $this->successResponse([
                'message' => 'Patient history updated successfully',
                'history' => new PatientHistoryResource($updatedHistory)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient history: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient history',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
