<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientTreatmentRequest;
use App\Models\PatientTreatment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\PatientTreatmentService;
use App\Traits\ApiResponse;
use App\Http\Requests\UpdatePatientTreatmentRequest;
use App\Http\Resources\PatientTreatmentByIdResource;
use App\Http\Requests\ShowPatientTreatmentRequest;
use App\Http\Resources\PatientTreatmentResource;
use Exception;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * @group Patient
 * @subgroup Treatments
 * @subgroupDescription PatientTreatmentController handles the CRUD operations for patient treatment (not-in-use) controller.
 */
class PatientTreatmentController extends Controller
{
    use ApiResponse;
    protected $patientTreatmentService;
    public function __construct(PatientTreatmentService $patientTreatmentService)
    {
        $this->patientTreatmentService = $patientTreatmentService;
    }

    /**
     * @group PatientTreatment
     *
     * @method GET
     *
     * List all patienttreatment
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Attempt to fetch the patient list from the service
            $treatment = $this->patientTreatmentService->getTreatmentDetails();

            // If no patients are found, return a custom message
            if ($treatment->isEmpty()) {
                return $this->successResponse(['message' => 'No patients found.']);
            }

            // Return the patient list in a successful response
            return $this->successResponse(['patientList' => $treatment]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group PatientTreatment
     *
     * @method POST
     *
     * Create a new patienttreatment
     *
     * @post /
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentResource
     */
    public function store(PatientTreatmentRequest $request)
    {
        try {
            // Validation happens automatically
            $validatedData = $request->validated();

            // Create treatment using service
            $treatment = $this->patientTreatmentService->createTreatment($validatedData);

            return $this->successResponse([
                'message' => 'Treatment created successfully',
                'treatment' => new PatientTreatmentResource($treatment)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientTreatment
     *
     * @method PUT
     *
     * Update an existing patienttreatment
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatment to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam TeethTreatment string optional. Example: "Example TeethTreatment"
     * @bodyParam TreatmentDetails string optional. Example: "Example TreatmentDetails"
     * @bodyParam TreamentCost number optional. numeric. Example: 1
     * @bodyParam TreatmentPayment string optional. Example: "Example TreatmentPayment"
     * @bodyParam TreatmentBalance string optional. Example: "Example TreatmentBalance"
     * @bodyParam TreatmentDate string optional. date. Example: "Example TreatmentDate"
     * @bodyParam ProviderInchargeID string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "data": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentResource
     */
    public function update(UpdatePatientTreatmentRequest $request, PatientTreatment $id)
    {
        // Get validated data
        try {
            $data = $request->validated();

            // Call the service to update the treatment
            $updatedPatientTreatment = $this->patientTreatmentService->updateTreatment($id, $data);

            return $this->successResponse([
                'message' => 'Patient treatment updated successfully!',
                'data' => new PatientTreatmentResource($updatedPatientTreatment)
            ]);
        } catch (Exception $e) {
            return $this->errorResponse(['message' => 'Something went wrong.']);
        }
    }

    /**
     * @group PatientTreatment
     *
     * @method DELETE
     *
     * Delete a patienttreatment
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatment to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->patientTreatmentService->deletePatientTreatment($id);

            if (!$deleted) {
                throw new ModelNotFoundException('Patient not found');
            }

            return $this->successResponse([
                'message' => 'Patient treatment deleted successfully!',
                'data' => []
            ]);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse(['message' => $e->getMessage()], errorCode: 404);
        } catch (Exception $e) {
            return $this->errorResponse(['message' => 'Something went wrong']);
        }
    }

    /**
     * @group PatientTreatment
     *
     * @method GET
     *
     * ShowPatientTreatment patienttreatment
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function showPatientTreatment(ShowPatientTreatmentRequest $request, Patient $patient)
    {
        $status = $request->input('status', 'ongoing');
        $ongoingTreatments = [];
        $completedTreatments = [];

        if ($status === 'ongoing' || $status === 'all') {
            $ongoingTreatments = $this->patientTreatmentService->getOngoingTreatmentDetails($patient);
        }

        if ($status === 'completed' || $status === 'all') {
            $completedTreatments = $this->patientTreatmentService->getCompletedTreatmentDetails($patient);
        }

        // Prepare response
        $treatments = compact('ongoingTreatments', 'completedTreatments');

        return $this->successResponse([
            'message' => 'Patient treatments retrieved successfully.',
            'data' => $treatments
        ]);
    }
}
