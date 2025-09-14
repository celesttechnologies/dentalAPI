<?php

namespace App\Http\Controllers;

use App\Models\PatientExamination;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Services\PatientExaminationService;
use App\Http\Requests\StorePatientExaminationRequest;
use App\Http\Requests\UpdatePatientExaminationRequest;
use App\Http\Resources\PatientExaminationResource;
use App\Models\Patient;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * @group Patient
 * @subgroup Examination
 * @subgroupDescription PatientExaminationController handles the CRUD operations for patient examination controller.
 */
class PatientExaminationController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientExaminationService $patientExaminationService) {}


    /**
     * @group PatientExamination
     *
     * @method GET
     *
     * List all patientexamination
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "examinations": [
     *                 {
     *                     "examination_id": 1,
     *                     "patient_id": 1,
     *                     "date_of_diagnosis": "Example value",
     *                     "provider_id": 1,
     *                     "chief_complaint": "Example value",
     *                     "patient_diagnosis_notes": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "diagnosis": "Example value"
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
        $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
        $data = $this->patientExaminationService->getExaminations($patient, $perPage);

        return $this->successResponse([
            'examinations' => PatientExaminationResource::collection($data['examinations']),
            'pagination' => $data['pagination']
        ]);
    }

    /**
     * @group PatientExamination
     *
     * @method POST
     *
     * Create a new patientexamination
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfDiagnosis string required. date. Example: "Example DateOfDiagnosis"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ChiefComplaint string optional. nullable. Example: "Example ChiefComplaint"
     * @bodyParam PatientDiagnosisNotes string optional. nullable. Example: "Example PatientDiagnosisNotes"
     * @bodyParam diagnosis.TreatmentTypeID string required. Example: "Example Diagnosis.TreatmentTypeID"
     * @bodyParam diagnosis.Description string required. Example: "Example Diagnosis.Description"
     * @bodyParam diagnosis.TeethTreatments string required. Example: "Example Diagnosis.TeethTreatments"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "examination": {
     *                 "examination_id": 1,
     *                 "patient_id": 1,
     *                 "date_of_diagnosis": "Example value",
     *                 "provider_id": 1,
     *                 "chief_complaint": "Example value",
     *                 "patient_diagnosis_notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "diagnosis": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientExaminationResource
     */
    public function store(StorePatientExaminationRequest $request, $patientId = null)
    {
        try {
            $validatedData = $request->validated();

            $examination = $this->patientExaminationService->createExamination($validatedData);

            return $this->successResponse([
                'message' => 'Examination record created successfully',
                'examination' => new PatientExaminationResource($examination)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating examination record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create examination record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientExamination
     *
     * @method PUT
     *
     * Update an existing patientexamination
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientexamination to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfDiagnosis string optional. date. Example: "Example DateOfDiagnosis"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ChiefComplaint string optional. Example: "Example ChiefComplaint"
     * @bodyParam PatientDiagnosisNotes string optional. Example: "Example PatientDiagnosisNotes"
     * @bodyParam IsDeleted boolean optional. Example: true
     * @bodyParam diagnosis.TreatmentTypeID string optional. Example: "Example Diagnosis.TreatmentTypeID"
     * @bodyParam diagnosis.Description string optional. Example: "Example Diagnosis.Description"
     * @bodyParam diagnosis.TeethTreatments string optional. Example: "Example Diagnosis.TeethTreatments"
     * @bodyParam diagnosis.IsDeleted boolean optional. Example: true
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "examination": {
     *                 "examination_id": 1,
     *                 "patient_id": 1,
     *                 "date_of_diagnosis": "Example value",
     *                 "provider_id": 1,
     *                 "chief_complaint": "Example value",
     *                 "patient_diagnosis_notes": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "diagnosis": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientExaminationResource
     */
    public function update(UpdatePatientExaminationRequest $request, $patientId = null, PatientExamination $patientExamination)
    {
        try {
            $validatedData = $request->validated();

            $updatedExamination = $this->patientExaminationService->updateExamination($patientExamination, $validatedData);

            return $this->successResponse([
                'message' => 'Examination record updated successfully',
                'examination' => new PatientExaminationResource($updatedExamination)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating examination record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update examination record',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
