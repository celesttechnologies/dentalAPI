<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientInsuranceDetailRequest;
use App\Http\Requests\UpdatePatientInsuranceDetailRequest;
use App\Http\Resources\PatientInsuranceDetailResource;
use App\Models\Patient;
use App\Models\PatientInsuranceDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use App\Services\PatientInsuranceDetailService; // Import the service
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * @group Patient
 * @subgroup InsuraceDetails
 * @subgroupDescription PatientInsuranceDetailController handles the CRUD operations for patient insurance detail controller.
 */
class PatientInsuranceDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientInsuranceDetailService $patientInsuranceDetailService)
    {
    }

    /**
     * @group PatientInsuranceDetail
     *
     * @method GET
     *
     * List all patientinsurancedetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "insurance_details": [
     *                 {
     *                     "insurance_detail_id": 1,
     *                     "patient_id": 1,
     *                     "insurance_provider": 1,
     *                     "policy_number": "Example value",
     *                     "coverage_start_date": "Example value",
     *                     "coverage_end_date": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
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
    public function index(Request $request, Patient $patient)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->patientInsuranceDetailService->getInsuranceDetails($patient, $perPage);

            return $this->successResponse([
                'insurance_details' => PatientInsuranceDetailResource::collection($data['insurance_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Insurance Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientInsuranceDetail
     *
     * @method POST
     *
     * Create a new patientinsurancedetail
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam IsDentalInsurance string required. Example: "Example IsDentalInsurance"
     * @bodyParam IsOrthodonticInsurance string required. Example: "Example IsOrthodonticInsurance"
     * @bodyParam PrimaryInsurerName string required. Example: "Example PrimaryInsurerName"
     * @bodyParam PrimarySubscriberID string required. Maximum length: 255. Example: "Example PrimarySubscriberID"
     * @bodyParam PrimaryGroupNo string required. Example: "Example PrimaryGroupNo"
     * @bodyParam SecondaryInsurerName string required. Example: "Example SecondaryInsurerName"
     * @bodyParam SecondarySubscriberID string required. Maximum length: 255. Example: "Example SecondarySubscriberID"
     * @bodyParam SecondaryGroupNo string required. Example: "Example SecondaryGroupNo"
     * @bodyParam TertiaryInsurerName string required. Example: "Example TertiaryInsurerName"
     * @bodyParam TertiarySubscriberID string required. Maximum length: 255. Example: "Example TertiarySubscriberID"
     * @bodyParam TertiaryGroupNo string required. Example: "Example TertiaryGroupNo"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "insurance_detail": {
     *                 "insurance_detail_id": 1,
     *                 "patient_id": 1,
     *                 "insurance_provider": 1,
     *                 "policy_number": "Example value",
     *                 "coverage_start_date": "Example value",
     *                 "coverage_end_date": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return PatientInsuranceDetailResource
     */
    public function store(StorePatientInsuranceDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $insuranceDetail = $this->patientInsuranceDetailService->createInsuranceDetail($validatedData);

            return $this->successResponse([
                'message' => 'Insurance detail created successfully',
                'insurance_detail' => new PatientInsuranceDetailResource($insuranceDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating insurance detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create insurance detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientInsuranceDetail
     *
     * @method PUT
     *
     * Update an existing patientinsurancedetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientinsurancedetail to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam IsDentalInsurance string optional. Example: "Example IsDentalInsurance"
     * @bodyParam IsOrthodonticInsurance string optional. Example: "Example IsOrthodonticInsurance"
     * @bodyParam PrimaryInsurerName string optional. Example: "Example PrimaryInsurerName"
     * @bodyParam PrimarySubscriberID string optional. Maximum length: 255. Example: "Example PrimarySubscriberID"
     * @bodyParam PrimaryGroupNo string optional. Example: "Example PrimaryGroupNo"
     * @bodyParam SecondaryInsurerName string optional. Example: "Example SecondaryInsurerName"
     * @bodyParam SecondarySubscriberID string optional. Maximum length: 255. Example: "Example SecondarySubscriberID"
     * @bodyParam SecondaryGroupNo string optional. Example: "Example SecondaryGroupNo"
     * @bodyParam TertiaryInsurerName string optional. Example: "Example TertiaryInsurerName"
     * @bodyParam TertiarySubscriberID string optional. Maximum length: 255. Example: "Example TertiarySubscriberID"
     * @bodyParam TertiaryGroupNo string optional. Example: "Example TertiaryGroupNo"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "insurance_detail": {
     *                 "insurance_detail_id": 1,
     *                 "patient_id": 1,
     *                 "insurance_provider": 1,
     *                 "policy_number": "Example value",
     *                 "coverage_start_date": "Example value",
     *                 "coverage_end_date": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return PatientInsuranceDetailResource
     */
    public function update(UpdatePatientInsuranceDetailRequest $request, PatientInsuranceDetail $patientInsuranceDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedInsuranceDetail = $this->patientInsuranceDetailService->updateInsuranceDetail($patientInsuranceDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Insurance detail updated successfully',
                'insurance_detail' => new PatientInsuranceDetailResource($updatedInsuranceDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating insurance detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update insurance detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
