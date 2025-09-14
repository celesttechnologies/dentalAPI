<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientTreatmentTypeDoneResource; // Assuming you have a resource for Patient Treatment Type Done
use App\Models\PatientTreatmentTypeDone;
use App\Services\PatientTreatmentTypeDoneService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientTreatmentTypeDoneRequest;
use App\Http\Requests\UpdatePatientTreatmentTypeDoneRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup TreatmentTypeDone
 * @subgroupDescription PatientTreatmentTypeDoneController handles the CRUD operations for patient treatment type controller.
 */
class PatientTreatmentTypeDoneController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientTreatmentTypeDoneService $patientTreatmentTypeDoneService)
    {
    }

    /**
     * @group PatientTreatmentTypeDone
     *
     * @method GET
     *
     * List all patienttreatmenttypedone
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_treatment_types_done": [
     *                 {
     *                     "patient_treatment_type_done_id": 1,
     *                     "patient_treatment_done_id": 1,
     *                     "treatment_type_id": 1,
     *                     "treatment_sub_type_id": 1,
     *                     "teeth_treatment": "Example value",
     *                     "teeth_treatment_note": "Example value",
     *                     "treatment_cost": "Example value",
     *                     "discount": "Example value",
     *                     "is_deleted": true,
     *                     "is_expanded": true,
     *                     "treatment_total_cost": "Example value",
     *                     "treatment_tax": "Example value",
     *                     "addition": "Example value",
     *                     "amount_to_be_collected": "Example value"
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
            $data = $this->patientTreatmentTypeDoneService->getPatientTreatmentTypesDone($patient, $perPage);

            return $this->successResponse([
                'patient_treatment_types_done' => PatientTreatmentTypeDoneResource::collection($data['patient_treatment_types_done']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Treatment Types Done: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientTreatmentTypeDone
     *
     * @method POST
     *
     * Create a new patienttreatmenttypedone
     *
     * @post /
     *
     * @bodyParam PatientTreatmentTypeDoneID string required. Maximum length: 255. Example: "Example PatientTreatmentTypeDoneID"
     * @bodyParam PatientTreatmentDoneID string required. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentTypeID string required. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam TreatmentSubTypeID string optional. nullable. Maximum length: 255. Example: "Example TreatmentSubTypeID"
     * @bodyParam TeethTreatment string optional. nullable. Example: "Example TeethTreatment"
     * @bodyParam TeethTreatmentNote string optional. nullable. Example: "Example TeethTreatmentNote"
     * @bodyParam TreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam Discount number optional. nullable. numeric. Example: 1
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam IsExpanded boolean optional. nullable. Example: true
     * @bodyParam TreatmentTotalCost number optional. nullable. numeric. Example: 1
     * @bodyParam TreatmentTax number optional. nullable. numeric. Example: 1
     * @bodyParam Addition number optional. nullable. numeric. Example: 1
     * @bodyParam AmountToBeCollected number optional. nullable. numeric. Example: 1
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_type_done": {
     *                 "patient_treatment_type_done_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_type_id": 1,
     *                 "treatment_sub_type_id": 1,
     *                 "teeth_treatment": "Example value",
     *                 "teeth_treatment_note": "Example value",
     *                 "treatment_cost": "Example value",
     *                 "discount": "Example value",
     *                 "is_deleted": true,
     *                 "is_expanded": true,
     *                 "treatment_total_cost": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "addition": "Example value",
     *                 "amount_to_be_collected": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentTypeDoneResource
     */
    public function store(StorePatientTreatmentTypeDoneRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $treatmentTypeDone = $this->patientTreatmentTypeDoneService->createTreatmentTypeDone($validatedData);

            return $this->successResponse([
                'message' => 'Treatment type done record created successfully',
                'treatment_type_done' => new PatientTreatmentTypeDoneResource($treatmentTypeDone)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment type done record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment type done record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientTreatmentTypeDone
     *
     * @method PUT
     *
     * Update an existing patienttreatmenttypedone
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatmenttypedone to update. Example: 1
     *
     * @bodyParam PatientTreatmentTypeDoneID string optional. Maximum length: 255. Example: "Example PatientTreatmentTypeDoneID"
     * @bodyParam PatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example PatientTreatmentDoneID"
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam TreatmentSubTypeID string optional. nullable. Maximum length: 255. Example: "Example TreatmentSubTypeID"
     * @bodyParam TeethTreatment string optional. nullable. Example: "Example TeethTreatment"
     * @bodyParam TeethTreatmentNote string optional. nullable. Example: "Example TeethTreatmentNote"
     * @bodyParam TreatmentCost number optional. nullable. numeric. Example: 1
     * @bodyParam Discount number optional. nullable. numeric. Example: 1
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam IsExpanded boolean optional. nullable. Example: true
     * @bodyParam TreatmentTotalCost number optional. nullable. numeric. Example: 1
     * @bodyParam TreatmentTax number optional. nullable. numeric. Example: 1
     * @bodyParam Addition number optional. nullable. numeric. Example: 1
     * @bodyParam AmountToBeCollected number optional. nullable. numeric. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_type_done": {
     *                 "patient_treatment_type_done_id": 1,
     *                 "patient_treatment_done_id": 1,
     *                 "treatment_type_id": 1,
     *                 "treatment_sub_type_id": 1,
     *                 "teeth_treatment": "Example value",
     *                 "teeth_treatment_note": "Example value",
     *                 "treatment_cost": "Example value",
     *                 "discount": "Example value",
     *                 "is_deleted": true,
     *                 "is_expanded": true,
     *                 "treatment_total_cost": "Example value",
     *                 "treatment_tax": "Example value",
     *                 "addition": "Example value",
     *                 "amount_to_be_collected": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentTypeDoneResource
     */
    public function update(UpdatePatientTreatmentTypeDoneRequest $request, PatientTreatmentTypeDone $patientTreatmentTypeDone)
    {
        try {
            $validatedData = $request->validated();

            $updatedTreatmentTypeDone = $this->patientTreatmentTypeDoneService->updateTreatmentTypeDone($patientTreatmentTypeDone, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment type done record updated successfully',
                'treatment_type_done' => new PatientTreatmentTypeDoneResource($updatedTreatmentTypeDone)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating treatment type done record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update treatment type done record',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
