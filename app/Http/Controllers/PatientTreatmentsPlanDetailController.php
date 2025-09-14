<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientTreatmentsPlanDetailResource; // Assuming you have a resource for Patient Treatments Plan Detail
use App\Models\PatientTreatmentsPlanDetail;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientTreatmentsPlanDetailRequest;
use App\Http\Requests\UpdatePatientTreatmentsPlanDetailRequest;
use App\Models\Patient;
use App\Services\PatientTreatmentsPlanService;

/**
 * @group Patient
 * @subgroup TreatmentsPlanDetail
 * @subgroupDescription PatientTreatmentsPlanDetailController handles the CRUD operations for patient treatment plan detail controller.
 */
class PatientTreatmentsPlanDetailController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientTreatmentsPlanService $patientTreatmentsPlanDetailService)
    {
    }

    /**
     * @group PatientTreatmentsPlanDetail
     *
     * @method GET
     *
     * List all patienttreatmentsplandetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_treatments_plan_details": [
     *                 {
     *                     "ID": "Example value",
     *                     "TreatmentTypeID": "Example value",
     *                     "TreatmentSubTypeID": "Example value",
     *                     "TeethTreatment": "Example value",
     *                     "TeethTreatmentNote": "Example value",
     *                     "TreatmentCost": "Example value",
     *                     "Discount": "Example value",
     *                     "IsDeleted": "Example value",
     *                     "IsExpanded": "Example value",
     *                     "TreatmentTotalCost": "Example value",
     *                     "TreatmentTax": "Example value",
     *                     "Addition": "Example value"
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
            $data = $this->patientTreatmentsPlanDetailService->getPatientTreatmentsPlanDetails($patient, $perPage);

            return $this->successResponse([
                'patient_treatments_plan_details' => PatientTreatmentsPlanDetailResource::collection($data['patient_treatments_plan_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Treatments Plan Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientTreatmentsPlanDetail
     *
     * @method PUT
     *
     * Update an existing patienttreatmentsplandetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patienttreatmentsplandetail to update. Example: 1
     *
     * @bodyParam PatientTreatmentPlanHeaderID string optional. Maximum length: 255. Example: "Example PatientTreatmentPlanHeaderID"
     * @bodyParam TreatmentTypeID string optional. Maximum length: 255. Example: "Example TreatmentTypeID"
     * @bodyParam TreatmentSubTypeID string optional. Maximum length: 255. Example: "Example TreatmentSubTypeID"
     * @bodyParam TeethTreatment string optional. Example: "Example TeethTreatment"
     * @bodyParam TeethTreatmentNote string optional. Example: "Example TeethTreatmentNote"
     * @bodyParam TreatmentCost number optional. numeric. Example: 1
     * @bodyParam Discount string optional. Example: "Example Discount"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam IsExpanded string optional. Example: "Example IsExpanded"
     * @bodyParam TreatmentTotalCost number optional. numeric. Example: 1
     * @bodyParam TreatmentTax string optional. Example: "Example TreatmentTax"
     * @bodyParam Addition string optional. Example: "Example Addition"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "treatment_plan_detail": {
     *                 "ID": "Example value",
     *                 "TreatmentTypeID": "Example value",
     *                 "TreatmentSubTypeID": "Example value",
     *                 "TeethTreatment": "Example value",
     *                 "TeethTreatmentNote": "Example value",
     *                 "TreatmentCost": "Example value",
     *                 "Discount": "Example value",
     *                 "IsDeleted": "Example value",
     *                 "IsExpanded": "Example value",
     *                 "TreatmentTotalCost": "Example value",
     *                 "TreatmentTax": "Example value",
     *                 "Addition": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientTreatmentsPlanDetailResource
     */
    public function update(UpdatePatientTreatmentsPlanDetailRequest $request, PatientTreatmentsPlanDetail $patientTreatmentsPlanDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedPlanDetail = $this->patientTreatmentsPlanDetailService->updateTreatmentsPlanDetail($patientTreatmentsPlanDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Treatment plan detail updated successfully',
                'treatment_plan_detail' => new PatientTreatmentsPlanDetailResource($updatedPlanDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating treatment plan detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update treatment plan detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
