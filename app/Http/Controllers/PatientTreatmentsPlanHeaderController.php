<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientTreatmentsPlanHeaderResource; // Assuming you have a resource for Patient Treatments Plan Header
use App\Models\PatientTreatmentsPlanHeader;
use App\Services\PatientTreatmentsPlanHeaderService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientTreatmentsPlanHeaderRequest;
use App\Http\Requests\UpdatePatientTreatmentsPlanHeaderRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup TreatmentsPlanHeader
 * @subgroupDescription PatientTreatmentsPlanHeaderController handles the CRUD operations for patient treatment plan header controller.
 */
class PatientTreatmentsPlanHeaderController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientTreatmentsPlanHeaderService $patientTreatmentsPlanHeaderService)
    {
    }

    /**
     * @group PatientTreatmentsPlanHeader
     *
     * @method GET
     *
     * List all patienttreatmentsplanheader
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_treatments_plan_headers": [
     *                 {
     *                     "ID": "Example value",
     *                     "PatientID": "Example value",
     *                     "ProviderID": 1,
     *                     "TreatmentPlanName": "Example value",
     *                     "TreatmentCost": "Example value",
     *                     "TreatmentDiscount": "Example value",
     *                     "TreatmentTax": "Example value",
     *                     "TreatmentTotalCost": "Example value",
     *                     "TreatmentDate": "Example value",
     *                     "ProviderInchargeID": 1,
     *                     "IsDeleted": "Example value",
     *                     "AddedBy": "Example value",
     *                     "AddedOn": "Example value",
     *                     "LastUpdatedBy": "Example value",
     *                     "LastUpdatedOn": "Example value",
     *                     "IsArchived": "Example value",
     *                     "ParentPatientTreatmentDoneID": "Example value",
     *                     "TreatmentAddition": "Example value",
     *                     "TreatmentPlanStatusID": "Example value",
     *                     "TreatmentDetails": "Example value"
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
            $data = $this->patientTreatmentsPlanHeaderService->getPatientTreatmentsPlanHeaders($patient, $perPage);

            return $this->successResponse([
                'patient_treatments_plan_headers' => PatientTreatmentsPlanHeaderResource::collection($data['patient_treatments_plan_headers']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Treatments Plan Headers: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientTreatmentsPlanHeader
     *
     * @method POST
     *
     * Create a new patienttreatmentsplanheader
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentPlanName string required. Example: "Example TreatmentPlanName"
     * @bodyParam TreatmentCost number required. numeric. Example: 1
     * @bodyParam TreatmentDiscount string required. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTax string required. Example: "Example TreatmentTax"
     * @bodyParam TreatmentTotalCost number required. numeric. Example: 1
     * @bodyParam TreatmentDate string required. date. Example: "Example TreatmentDate"
     * @bodyParam ProviderInchargeID string required. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam AddedBy string required. Example: "Example AddedBy"
     * @bodyParam AddedOn string required. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     * @bodyParam IsArchived string required. Example: "Example IsArchived"
     * @bodyParam ParentPatientTreatmentDoneID string required. Maximum length: 255. Example: "Example ParentPatientTreatmentDoneID"
     * @bodyParam TreatmentAddition string required. Example: "Example TreatmentAddition"
     * @bodyParam TreatmentPlanStatusID string required. Maximum length: 255. Example: "Example TreatmentPlanStatusID"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_plan_header": {
     *                 "ID": "Example value",
     *                 "PatientID": "Example value",
     *                 "ProviderID": 1,
     *                 "TreatmentPlanName": "Example value",
     *                 "TreatmentCost": "Example value",
     *                 "TreatmentDiscount": "Example value",
     *                 "TreatmentTax": "Example value",
     *                 "TreatmentTotalCost": "Example value",
     *                 "TreatmentDate": "Example value",
     *                 "ProviderInchargeID": 1,
     *                 "IsDeleted": "Example value",
     *                 "AddedBy": "Example value",
     *                 "AddedOn": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "IsArchived": "Example value",
     *                 "ParentPatientTreatmentDoneID": "Example value",
     *                 "TreatmentAddition": "Example value",
     *                 "TreatmentPlanStatusID": "Example value",
     *                 "TreatmentDetails": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsPlanHeaderResource
     */
    public function store(StorePatientTreatmentsPlanHeaderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $planHeader = $this->patientTreatmentsPlanHeaderService->createTreatmentsPlanHeader($validatedData);

            return $this->successResponse([
                'message' => 'Treatment plan header created successfully',
                'treatment_plan_header' => new PatientTreatmentsPlanHeaderResource($planHeader)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating treatment plan header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create treatment plan header',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientTreatmentsPlanHeader
     *
     * @method PUT
     *
     * Update an existing patienttreatmentsplanheader
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatmentsplanheader to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam TreatmentPlanName string optional. Example: "Example TreatmentPlanName"
     * @bodyParam TreatmentCost number optional. numeric. Example: 1
     * @bodyParam TreatmentDiscount string optional. Example: "Example TreatmentDiscount"
     * @bodyParam TreatmentTax string optional. Example: "Example TreatmentTax"
     * @bodyParam TreatmentTotalCost number optional. numeric. Example: 1
     * @bodyParam TreatmentDate string optional. date. Example: "Example TreatmentDate"
     * @bodyParam ProviderInchargeID string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam AddedBy string optional. Example: "Example AddedBy"
     * @bodyParam AddedOn string optional. Example: "Example AddedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     * @bodyParam IsArchived string optional. Example: "Example IsArchived"
     * @bodyParam ParentPatientTreatmentDoneID string optional. Maximum length: 255. Example: "Example ParentPatientTreatmentDoneID"
     * @bodyParam TreatmentAddition string optional. Example: "Example TreatmentAddition"
     * @bodyParam TreatmentPlanStatusID string optional. Maximum length: 255. Example: "Example TreatmentPlanStatusID"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_plan_header": {
     *                 "ID": "Example value",
     *                 "PatientID": "Example value",
     *                 "ProviderID": 1,
     *                 "TreatmentPlanName": "Example value",
     *                 "TreatmentCost": "Example value",
     *                 "TreatmentDiscount": "Example value",
     *                 "TreatmentTax": "Example value",
     *                 "TreatmentTotalCost": "Example value",
     *                 "TreatmentDate": "Example value",
     *                 "ProviderInchargeID": 1,
     *                 "IsDeleted": "Example value",
     *                 "AddedBy": "Example value",
     *                 "AddedOn": "Example value",
     *                 "LastUpdatedBy": "Example value",
     *                 "LastUpdatedOn": "Example value",
     *                 "IsArchived": "Example value",
     *                 "ParentPatientTreatmentDoneID": "Example value",
     *                 "TreatmentAddition": "Example value",
     *                 "TreatmentPlanStatusID": "Example value",
     *                 "TreatmentDetails": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsPlanHeaderResource
     */
    public function update(UpdatePatientTreatmentsPlanHeaderRequest $request, PatientTreatmentsPlanHeader $patientTreatmentsPlanHeader)
    {
        try {
            $validatedData = $request->validated();

            $updatedPlanHeader = $this->patientTreatmentsPlanHeaderService->updateTreatmentsPlanHeader($patientTreatmentsPlanHeader, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment plan header updated successfully',
                'treatment_plan_header' => new PatientTreatmentsPlanHeaderResource($updatedPlanHeader)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating treatment plan header: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update treatment plan header',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
