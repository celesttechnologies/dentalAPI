<?php

namespace App\Http\Controllers;

use App\Models\PatientDocument;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Exception;
use App\Services\PatientDocumentService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDocumentResource;
use App\Http\Requests\StorePatientDocumentRequest;
use App\Http\Requests\UpdatePatientDocumentRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup Documents
 * @subgroupDescription PatientDocumentController handles the CRUD operations for patient documents controller.
 */
class PatientDocumentController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDocumentService $patientDocumentService)
    {
    }

    /**
     * @group PatientDocument
     *
     * @method GET
     *
     * List all patientdocument
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "documents": [
     *                 {
     *                     "patient_document_id": 1,
     *                     "patient_id": 1,
     *                     "document_id": 1,
     *                     "patient_treatment_id": 1
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
            $data = $this->patientDocumentService->getDocuments($patient, $perPage);

            return $this->successResponse([
                'documents' => PatientDocumentResource::collection($data['documents']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Documents: ' . $e->getMessage());


            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PatientDocument
     *
     * @method POST
     *
     * Create a new patientdocument
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DocumentID string required. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam PatientTreatmentID string required. Maximum length: 255. Example: "Example PatientTreatmentID"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "document": {
     *                 "patient_document_id": 1,
     *                 "patient_id": 1,
     *                 "document_id": 1,
     *                 "patient_treatment_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDocumentResource
     */
    public function store(StorePatientDocumentRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $document = $this->patientDocumentService->createPatientDocument($validatedData);

            return $this->successResponse([
                'message' => 'Patient document created successfully',
                'document' => new PatientDocumentResource($document)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient document: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient document',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDocument
     *
     * @method PUT
     *
     * Update an existing patientdocument
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdocument to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DocumentID string optional. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam PatientTreatmentID string optional. Maximum length: 255. Example: "Example PatientTreatmentID"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "document": {
     *                 "patient_document_id": 1,
     *                 "patient_id": 1,
     *                 "document_id": 1,
     *                 "patient_treatment_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDocumentResource
     */
    public function update(UpdatePatientDocumentRequest $request, PatientDocument $patientDocument)
    {
        try {
            $validatedData = $request->validated();

            $updatedDocument = $this->patientDocumentService->updatePatientDocument($patientDocument, $validatedData);

            return $this->successResponse([
                'message' => 'Patient document updated successfully',
                'document' => new PatientDocumentResource($updatedDocument)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient document: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient document',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
