<?php

namespace App\Http\Controllers;

use App\Models\PatientDOCServerDocumentDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Exception;
use App\Services\PatientDOCServerDocumentDetailService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDOCServerDocumentDetailResource;
use App\Http\Requests\StorePatientDOCServerDocumentDetailRequest;
use App\Http\Requests\UpdatePatientDOCServerDocumentDetailRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup DocServerDocumentDetail
 * @subgroupDescription PatientDOCServerDocumentDetailController handles the CRUD operations for patient doc server document detail controller.
 */
class PatientDOCServerDocumentDetailController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDOCServerDocumentDetailService $patientDOCServerDocumentDetailService)
    {
    }

    /**
     * @group PatientDOCServerDocumentDetail
     *
     * @method GET
     *
     * List all patientdocserverdocumentdetail
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "document_details": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "partition_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "folder_path": "Example value",
     *                     "absolute_path": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "owner": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
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
            $data = $this->patientDOCServerDocumentDetailService->getDocumentDetails($patient, $perPage);

            return $this->successResponse([
                'document_details' => PatientDOCServerDocumentDetailResource::collection($data['document_details']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Document Server Details: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDOCServerDocumentDetail
     *
     * @method POST
     *
     * Create a new patientdocserverdocumentdetail
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PartitionID string required. Maximum length: 255. Example: "Example PartitionID"
     * @bodyParam Title string required. Example: "Example Title"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam FolderPath string required. Example: "Example FolderPath"
     * @bodyParam AbsolutePath string required. Example: "Example AbsolutePath"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam Owner string required. Example: "Example Owner"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam RowGuid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "document_detail": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "partition_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "folder_path": "Example value",
     *                 "absolute_path": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "owner": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDOCServerDocumentDetailResource
     */
    public function store(StorePatientDOCServerDocumentDetailRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $documentDetail = $this->patientDOCServerDocumentDetailService->createDocumentDetail($validatedData);

            return $this->successResponse([
                'message' => 'Document detail created successfully',
                'document_detail' => new PatientDOCServerDocumentDetailResource($documentDetail)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating document detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create document detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDOCServerDocumentDetail
     *
     * @method PUT
     *
     * Update an existing patientdocserverdocumentdetail
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdocserverdocumentdetail to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam PartitionID string optional. Maximum length: 255. Example: "Example PartitionID"
     * @bodyParam Title string optional. Example: "Example Title"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam FolderPath string optional. Example: "Example FolderPath"
     * @bodyParam AbsolutePath string optional. Example: "Example AbsolutePath"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam Owner string optional. Example: "Example Owner"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam RowGuid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "document_detail": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "partition_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "folder_path": "Example value",
     *                 "absolute_path": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "owner": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
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
     * @return PatientDOCServerDocumentDetailResource
     */
    public function update(UpdatePatientDOCServerDocumentDetailRequest $request, PatientDOCServerDocumentDetail $patientDOCServerDocumentDetail)
    {
        try {
            $validatedData = $request->validated();

            $updatedDocumentDetail = $this->patientDOCServerDocumentDetailService->updateDocumentDetail($patientDOCServerDocumentDetail, $validatedData);

            return $this->successResponse([
                'message' => 'Document detail updated successfully',
                'document_detail' => new PatientDOCServerDocumentDetailResource($updatedDocumentDetail)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating document detail: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update document detail',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
