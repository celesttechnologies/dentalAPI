<?php

namespace App\Http\Controllers;

use App\Models\PatientDentalHistory;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientDentalHistoryService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePatientDentalHistoryRequest;
use App\Http\Requests\UpdatePatientDentalHistoryRequest;
use App\Http\Resources\PatientDentalHistoryResource;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Dental History
 * @subgroupDescription PatientDentalHistoryController handles the CRUD operations for patient dental history controller.
 */
class PatientDentalHistoryController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDentalHistoryService $patientDentalHistoryService)
    {
    }

    /**
     * @group PatientDentalHistory
     *
     * @method GET
     *
     * List all patientdentalhistory
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "histories": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "treatment_type_id": 1,
     *                     "notes": "Example value",
     *                     "teeth_treatments": "Example value",
     *                     "is_deleted": true,
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientDentalHistoryService->getHistories($patient, $perPage);

            return $this->successResponse([
                'histories' => PatientDentalHistoryResource::collection($data['histories']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Dental Histories: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDentalHistory
     *
     * @method POST
     *
     * Create a new patientdentalhistory
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam Notes string required. Example: "Example Notes"
     * @bodyParam TeethTreatments string required. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "dental_history": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "treatment_type_id": 1,
     *                 "notes": "Example value",
     *                 "teeth_treatments": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDentalHistoryResource
     */
    public function store(StorePatientDentalHistoryRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $dentalHistory = $this->patientDentalHistoryService->createDentalHistory($validatedData);

            return $this->successResponse([
                'message' => 'Dental history created successfully',
                'dental_history' => new PatientDentalHistoryResource($dentalHistory)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating dental history: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create dental history',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDentalHistory
     *
     * @method PUT
     *
     * Update an existing patientdentalhistory
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdentalhistory to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam Notes string optional. Example: "Example Notes"
     * @bodyParam TeethTreatments string optional. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "dental_history": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "treatment_type_id": 1,
     *                 "notes": "Example value",
     *                 "teeth_treatments": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
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
     * @return PatientDentalHistoryResource
     */
    public function update(UpdatePatientDentalHistoryRequest $request, PatientDentalHistory $patientDentalHistory)
    {
        try {
            $validatedData = $request->validated();

            $updatedDentalHistory = $this->patientDentalHistoryService->updateDentalHistory($patientDentalHistory, $validatedData);

            return $this->successResponse([
                'message' => 'Dental history updated successfully',
                'dental_history' => new PatientDentalHistoryResource($updatedDentalHistory)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating dental history: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update dental history',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
