<?php

namespace App\Http\Controllers;

use App\Models\PatientExaminationDiagnosis;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use App\Services\PatientExaminationDiagnosisService; // Import the service
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StorePatientExaminationDiagnosisRequest;
use App\Http\Requests\UpdatePatientExaminationDiagnosisRequest;
use App\Http\Resources\PatientExaminationDiagnosisResource;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup ExaminationDiagnosis
 * @subgroupDescription PatientExaminationDiagnosisController handles the CRUD operations for patient examination diagnosis controller.
 */
class PatientExaminationDiagnosisController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientExaminationDiagnosisService $patientExaminationDiagnosisService)
    {
    }

    /**
     * @group PatientExaminationDiagnosis
     *
     * @method GET
     *
     * List all patientexaminationdiagnosis
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnoses": [
     *                 {
     *                     "diagnosis_id": 1,
     *                     "treatment_type": "Example value",
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "teeth_treatments": "Example value",
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
            $data = $this->patientExaminationDiagnosisService->getDiagnoses($patient, $perPage);

            return $this->successResponse([
                'diagnoses' => PatientExaminationDiagnosisResource::collection($data['diagnoses']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Examination Diagnoses: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }
    }

    /**
     * @group PatientExaminationDiagnosis
     *
     * @method POST
     *
     * Create a new patientexaminationdiagnosi
     *
     * @post /
     *
     * @bodyParam PatientExaminationID string required. Maximum length: 255. Example: "Example PatientExaminationID"
     * @bodyParam TreatmentTypeID number required. integer. Example: 1
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam TeethTreatments string optional. nullable. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnosis": {
     *                 "diagnosis_id": 1,
     *                 "treatment_type": "Example value",
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "teeth_treatments": "Example value",
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
     * @return PatientExaminationDiagnosisResource
     */
    public function store(StorePatientExaminationDiagnosisRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $diagnosis = $this->patientExaminationDiagnosisService->createDiagnosis($validatedData);

            return $this->successResponse([
                'message' => 'Examination diagnosis created successfully',
                'diagnosis' => new PatientExaminationDiagnosisResource($diagnosis)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating examination diagnosis: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create examination diagnosis',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientExaminationDiagnosis
     *
     * @method PUT
     *
     * Update an existing patientexaminationdiagnosi
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientexaminationdiagnosis to update. Example: 1
     *
     * @bodyParam PatientExaminationID string optional. Maximum length: 255. Example: "Example PatientExaminationID"
     * @bodyParam TreatmentTypeID number optional. integer. Example: 1
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam TeethTreatments string optional. nullable. Example: "Example TeethTreatments"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnosis": {
     *                 "diagnosis_id": 1,
     *                 "treatment_type": "Example value",
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "teeth_treatments": "Example value",
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
     * @return PatientExaminationDiagnosisResource
     */
    public function update(UpdatePatientExaminationDiagnosisRequest $request, PatientExaminationDiagnosis $patientExaminationDiagnosis)
    {
        try {
            $validatedData = $request->validated();

            $updatedDiagnosis = $this->patientExaminationDiagnosisService->updateDiagnosis($patientExaminationDiagnosis, $validatedData);

            return $this->successResponse([
                'message' => 'Examination diagnosis updated successfully',
                'diagnosis' => new PatientExaminationDiagnosisResource($updatedDiagnosis)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating examination diagnosis: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update examination diagnosis',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
