<?php

namespace App\Http\Controllers;

use App\Models\PatientPrescription;
use App\Http\Resources\PatientPrescriptionResource; // Assuming you have a resource for Patient Prescription
use App\Services\PatientPrescriptionService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePatientPrescriptionRequest; // Assuming you have a request for storing prescriptions
use App\Http\Requests\UpdatePatientPrescriptionRequest; // Assuming you have a request for updating prescriptions
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Prescriptions
 * @subgroupDescription PatientPrescriptionController handles the CRUD operations for patient prescriptions controller.
 */
class PatientPrescriptionController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PatientPrescriptionService $patientPrescriptionService)
    {
    }

    /**
     * @group PatientPrescription
     *
     * @method GET
     *
     * List all patientprescription
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "patient_prescriptions": [
     *                 {
     *                     "patient_prescription_id": 1,
     *                     "patient_id": 1,
     *                     "provider_id": 1,
     *                     "prescription_note": "Example value",
     *                     "date_of_prescription": "Example value",
     *                     "next_follow_up": "Example value",
     *                     "investigation_advised_ids": 1,
     *                     "patient_investigation_id": 1,
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "rowguid": 1,
     *                     "is_followup_sms_required": true
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
            $data = $this->patientPrescriptionService->getPatientPrescriptions($patient, $perPage);

            return $this->successResponse([
                'patient_prescriptions' => PatientPrescriptionResource::collection($data['patient_prescriptions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Prescriptions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientPrescription
     *
     * @method POST
     *
     * Create a new patientprescription
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam PrescriptionNote string required. Maximum length: 255. Example: "Example PrescriptionNote"
     * @bodyParam DateOfPrescription string required. Maximum length: 255. Example: "Example DateOfPrescription"
     * @bodyParam NextFollowUp string required. Maximum length: 255. Example: "Example NextFollowUp"
     * @bodyParam InvestigationAdvisedIDCSV string optional. nullable. Maximum length: 255. Example: "Example InvestigationAdvisedIDCSV"
     * @bodyParam PatientInvestigationID string optional. nullable. Maximum length: 255. Example: "Example PatientInvestigationID"
     * @bodyParam IsDeleted string optional. nullable. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription": {
     *                 "patient_prescription_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "prescription_note": "Example value",
     *                 "date_of_prescription": "Example value",
     *                 "next_follow_up": "Example value",
     *                 "investigation_advised_ids": 1,
     *                 "patient_investigation_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "is_followup_sms_required": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientPrescriptionResource
     */
    public function store(StorePatientPrescriptionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $prescription = $this->patientPrescriptionService->createPrescription($validatedData);

            return $this->successResponse([
                'message' => 'Prescription created successfully',
                'prescription' => new PatientPrescriptionResource($prescription)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating prescription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create prescription',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientPrescription
     *
     * @method PUT
     *
     * Update an existing patientprescription
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientprescription to update. Example: 1
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam PrescriptionNote string required. Maximum length: 255. Example: "Example PrescriptionNote"
     * @bodyParam DateOfPrescription string required. Maximum length: 255. Example: "Example DateOfPrescription"
     * @bodyParam NextFollowUp string required. Maximum length: 255. Example: "Example NextFollowUp"
     * @bodyParam InvestigationAdvisedIDCSV string optional. nullable. Maximum length: 255. Example: "Example InvestigationAdvisedIDCSV"
     * @bodyParam PatientInvestigationID string optional. nullable. Maximum length: 255. Example: "Example PatientInvestigationID"
     * @bodyParam IsDeleted string optional. nullable. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription": {
     *                 "patient_prescription_id": 1,
     *                 "patient_id": 1,
     *                 "provider_id": 1,
     *                 "prescription_note": "Example value",
     *                 "date_of_prescription": "Example value",
     *                 "next_follow_up": "Example value",
     *                 "investigation_advised_ids": 1,
     *                 "patient_investigation_id": 1,
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1,
     *                 "is_followup_sms_required": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientPrescriptionResource
     */
    public function update(UpdatePatientPrescriptionRequest $request, PatientPrescription $patientPrescription)
    {
        try {
            $validatedData = $request->validated();

            $updatedPrescription = $this->patientPrescriptionService->updatePrescription($patientPrescription, $validatedData);

            return $this->successResponse([
                'message' => 'Prescription updated successfully',
                'prescription' => new PatientPrescriptionResource($updatedPrescription)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating prescription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update prescription',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
