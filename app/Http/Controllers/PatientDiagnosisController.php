<?php

namespace App\Http\Controllers;

use App\Models\PatientDiagnosis;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\PatientDiagnosisService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDiagnosisResource;
use App\Http\Requests\StorePatientDiagnosisRequest;
use App\Http\Requests\UpdatePatientDiagnosisRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Diagnosis
 * @subgroupDescription PatientDiagnosisController handles the CRUD operations for patient diagnosis controller.
 */
class PatientDiagnosisController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDiagnosisService $diagnosisService)
    {
    }

    /**
     * @group PatientDiagnosis
     *
     * @method GET
     *
     * List all patientdiagnosis
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnoses": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "date_of_diagnosis": "Example value",
     *                     "provider_id": 1,
     *                     "chief_complaint": "Example value",
     *                     "notes": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
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
            $data = $this->diagnosisService->getDiagnoses($patient, $perPage);

            return $this->successResponse([
                'diagnoses' => PatientDiagnosisResource::collection($data['diagnoses']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Diagnoses: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDiagnosis
     *
     * @method POST
     *
     * Create a new patientdiagnosi
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfDiagnosis string required. date. Example: "Example DateOfDiagnosis"
     * @bodyParam ProviderID string required. Maximum length: 255. Example: "1"
     * @bodyParam ChiefComplaint string required. Example: "Example ChiefComplaint"
     * @bodyParam PatientDiagnosisNotes string required. Example: "Example PatientDiagnosisNotes"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnosis": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "date_of_diagnosis": "Example value",
     *                 "provider_id": 1,
     *                 "chief_complaint": "Example value",
     *                 "notes": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return PatientDiagnosisResource
     */
    public function store(StorePatientDiagnosisRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $diagnosis = $this->diagnosisService->createDiagnosis($validatedData);

            return $this->successResponse([
                'message' => 'Patient diagnosis created successfully',
                'diagnosis' => new PatientDiagnosisResource($diagnosis)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient diagnosis: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient diagnosis',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDiagnosis
     *
     * @method PUT
     *
     * Update an existing patientdiagnosi
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdiagnosis to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DateOfDiagnosis string optional. date. Example: "Example DateOfDiagnosis"
     * @bodyParam ProviderID string optional. Maximum length: 255. Example: "1"
     * @bodyParam ChiefComplaint string optional. Example: "Example ChiefComplaint"
     * @bodyParam PatientDiagnosisNotes string optional. Example: "Example PatientDiagnosisNotes"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "diagnosis": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "date_of_diagnosis": "Example value",
     *                 "provider_id": 1,
     *                 "chief_complaint": "Example value",
     *                 "notes": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
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
     * @return PatientDiagnosisResource
     */
    public function update(UpdatePatientDiagnosisRequest $request, PatientDiagnosis $patientDiagnosis)
    {
        try {
            $validatedData = $request->validated();

            $updatedDiagnosis = $this->diagnosisService->updateDiagnosis($patientDiagnosis, $validatedData);

            return $this->successResponse([
                'message' => 'Patient diagnosis updated successfully',
                'diagnosis' => new PatientDiagnosisResource($updatedDiagnosis)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient diagnosis: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient diagnosis',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
