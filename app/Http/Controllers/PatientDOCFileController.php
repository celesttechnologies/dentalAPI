<?php

namespace App\Http\Controllers;

use App\Models\PatientDOCFile;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Exception;
use App\Services\PatientDOCFileService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDOCFileResource;
use App\Http\Requests\StorePatientDOCFileRequest;
use App\Http\Requests\UpdatePatientDOCFileRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup DOCFile
 * @subgroupDescription PatientDOCFileController handles the CRUD operations for patient doc file controller.
 */
class PatientDOCFileController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDOCFileService $docFileService)
    {
    }

    /**
     * @group PatientDOCFile
     *
     * @method GET
     *
     * List all patientdocfile
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_files": [
     *                 {
     *                     "id": 1,
     *                     "patient_id": 1,
     *                     "clinic_id": 1,
     *                     "document_id": 1,
     *                     "version_number": "Example value",
     *                     "related_version_id": 1,
     *                     "related_version_number": "Example value",
     *                     "folder_id": 1,
     *                     "status_id": 1,
     *                     "description": "Example value",
     *                     "file_name": "Example Name",
     *                     "virtual_file_path": "Example value",
     *                     "physical_file_path": "Example value",
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "is_deleted": true,
     *                     "publish_on": "Example value",
     *                     "expiration_on": "Example value",
     *                     "ref_id": 1,
     *                     "ref_id1": 1,
     *                     "file_size": "Example value",
     *                     "file_type": "Example value",
     *                     "uploaded_file_name": "Example Name",
     *                     "file_thumb_image": "Example value",
     *                     "reference_no": "Example value",
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
            $data = $this->docFileService->getDOCFiles($patient, $perPage);

            return $this->successResponse([
                'doc_files' => PatientDOCFileResource::collection($data['doc_files']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Document Files: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDOCFile
     *
     * @method POST
     *
     * Create a new patientdocfile
     *
     * @post /
     *
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam DocumentID string required. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam VersionNumber string required. Example: "Example VersionNumber"
     * @bodyParam RelatedVersionID string required. Maximum length: 255. Example: "Example RelatedVersionID"
     * @bodyParam RelatedVersionNumber string required. Example: "Example RelatedVersionNumber"
     * @bodyParam FolderId string required. Maximum length: 255. Example: "Example FolderId"
     * @bodyParam StatusID string required. Maximum length: 255. Example: "Example StatusID"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam FileName string required. Example: "Example FileName"
     * @bodyParam VirtualFilePath string required. Example: "Example VirtualFilePath"
     * @bodyParam PhysicalFilePath string required. Example: "Example PhysicalFilePath"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam PublishOn string required. Example: "Example PublishOn"
     * @bodyParam ExpirationOn string required. Example: "Example ExpirationOn"
     * @bodyParam RefId string required. Maximum length: 255. Example: "Example RefId"
     * @bodyParam RefId1 string required. Maximum length: 255. Example: "Example RefId1"
     * @bodyParam FileSize string required. Example: "Example FileSize"
     * @bodyParam FileType string required. Example: "Example FileType"
     * @bodyParam UploadedFileName string required. Example: "Example UploadedFileName"
     * @bodyParam FileThumbImage string required. Example: "Example FileThumbImage"
     * @bodyParam ReferenceNo string required. Example: "Example ReferenceNo"
     * @bodyParam rowguid string required. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "docFile": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "folder_id": 1,
     *                 "status_id": 1,
     *                 "description": "Example value",
     *                 "file_name": "Example Name",
     *                 "virtual_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "ref_id": 1,
     *                 "ref_id1": 1,
     *                 "file_size": "Example value",
     *                 "file_type": "Example value",
     *                 "uploaded_file_name": "Example Name",
     *                 "file_thumb_image": "Example value",
     *                 "reference_no": "Example value",
     *                 "row_guid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDOCFileResource
     */
    public function store(StorePatientDOCFileRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $docFile = $this->docFileService->createDOCFile($validatedData);

            return $this->successResponse([
                'message' => 'Patient document file created successfully',
                'docFile' => new PatientDOCFileResource($docFile)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient document file: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient document file',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDOCFile
     *
     * @method PUT
     *
     * Update an existing patientdocfile
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdocfile to update. Example: 1
     *
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam DocumentID string optional. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam VersionNumber string optional. Example: "Example VersionNumber"
     * @bodyParam RelatedVersionID string optional. Maximum length: 255. Example: "Example RelatedVersionID"
     * @bodyParam RelatedVersionNumber string optional. Example: "Example RelatedVersionNumber"
     * @bodyParam FolderId string optional. Maximum length: 255. Example: "Example FolderId"
     * @bodyParam StatusID string optional. Maximum length: 255. Example: "Example StatusID"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam FileName string optional. Example: "Example FileName"
     * @bodyParam VirtualFilePath string optional. Example: "Example VirtualFilePath"
     * @bodyParam PhysicalFilePath string optional. Example: "Example PhysicalFilePath"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam PublishOn string optional. Example: "Example PublishOn"
     * @bodyParam ExpirationOn string optional. Example: "Example ExpirationOn"
     * @bodyParam RefId string optional. Maximum length: 255. Example: "Example RefId"
     * @bodyParam RefId1 string optional. Maximum length: 255. Example: "Example RefId1"
     * @bodyParam FileSize string optional. Example: "Example FileSize"
     * @bodyParam FileType string optional. Example: "Example FileType"
     * @bodyParam UploadedFileName string optional. Example: "Example UploadedFileName"
     * @bodyParam FileThumbImage string optional. Example: "Example FileThumbImage"
     * @bodyParam ReferenceNo string optional. Example: "Example ReferenceNo"
     * @bodyParam rowguid string optional. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "docFile": {
     *                 "id": 1,
     *                 "patient_id": 1,
     *                 "clinic_id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "folder_id": 1,
     *                 "status_id": 1,
     *                 "description": "Example value",
     *                 "file_name": "Example Name",
     *                 "virtual_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_deleted": true,
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "ref_id": 1,
     *                 "ref_id1": 1,
     *                 "file_size": "Example value",
     *                 "file_type": "Example value",
     *                 "uploaded_file_name": "Example Name",
     *                 "file_thumb_image": "Example value",
     *                 "reference_no": "Example value",
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
     * @return PatientDOCFileResource
     */
    public function update(UpdatePatientDOCFileRequest $request, PatientDOCFile $patientDOCFile)
    {
        try {
            $validatedData = $request->validated();

            $updatedDOCFile = $this->docFileService->updateDOCFile($patientDOCFile, $validatedData);

            return $this->successResponse([
                'message' => 'Patient document file updated successfully',
                'docFile' => new PatientDOCFileResource($updatedDOCFile)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient document file: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient document file',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
