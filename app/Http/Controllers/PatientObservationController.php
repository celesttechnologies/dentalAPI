<?php

namespace App\Http\Controllers;

use App\Models\PatientObservation;
use App\Http\Resources\PatientObservationResource; // Assuming you have a resource for Patient Observation
use App\Services\PatientObservationService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientObservationRequest; // Assuming you have a request for storing patient observation
use App\Http\Requests\UpdatePatientObservationRequest; // Assuming you have a request for updating patient observation
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Observation
 * @subgroupDescription PatientObservationController handles the CRUD operations for patient observation controller.
 */
class PatientObservationController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientObservationService $patientObservationService)
    {
    }

    /**
     * @group PatientObservation
     *
     * @method GET
     *
     * List all patientobservation
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_observations": [
     *                 {
     *                     "patient_observation_id": 1,
     *                     "patient_id": 1,
     *                     "treatment_type_id": 1,
     *                     "date_of_history": "Example value",
     *                     "description": "Example value",
     *                     "teeth_treatments": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "provider_id": 1,
     *                     "rowguid": 1
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
            $data = $this->patientObservationService->getPatientObservations($patient, $perPage);

            return $this->successResponse([
                'patient_observations' => PatientObservationResource::collection($data['patient_observations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Observations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientObservation
     *
     * @method POST
     *
     * Create a new patientobservation
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
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
     *             "observation": {
     *                 "patient_observation_id": 1,
     *                 "patient_id": 1,
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
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientObservationResource
     */
    public function store(StorePatientObservationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $observation = $this->patientObservationService->createObservation($validatedData);

            return $this->successResponse([
                'message' => 'Patient observation created successfully',
                'observation' => new PatientObservationResource($observation)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient observation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient observation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientObservation
     *
     * @method PUT
     *
     * Update an existing patientobservation
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientobservation to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
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
     *             "observation": {
     *                 "patient_observation_id": 1,
     *                 "patient_id": 1,
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
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientObservationResource
     */
    public function update(UpdatePatientObservationRequest $request, PatientObservation $patientObservation)
    {
        try {
            $validatedData = $request->validated();

            $updatedObservation = $this->patientObservationService->updateObservation($patientObservation, $validatedData);

            return $this->successResponse([
                'message' => 'Patient observation updated successfully',
                'observation' => new PatientObservationResource($updatedObservation)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient observation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient observation',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
