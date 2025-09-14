<?php

namespace App\Http\Controllers;

use App\Models\PatientDOCFolder;
use Illuminate\Http\Request;
use App\Traits\ApiResponse; // Assuming you have a trait for API responses
use Exception;
use App\Services\PatientDOCFolderService; // Import the service
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PatientDOCFolderResource;
use App\Http\Requests\StorePatientDOCFolderRequest;
use App\Http\Requests\UpdatePatientDOCFolderRequest;
use App\Models\Patient;

/**
 * @group Patient
 * @subgroup DOCFolder
 * @subgroupDescription PatientDOCFolderController handles the CRUD operations for patient doc folder controller.
 */
class PatientDOCFolderController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientDOCFolderService $patientDOCFolderService)
    {
    }

    /**
     * @group PatientDOCFolder
     *
     * @method GET
     *
     * List all patientdocfolder
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "folders": [
     *                 {
     *                     "folder_id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "description": "Example value",
     *                     "parent_folder_id": 1,
     *                     "folder_type_id": 1,
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "folder_path": "Example value",
     *                     "partition_id": 1,
     *                     "row_guid": 1,
     *                     "folder_type": "Example value",
     *                     "owner": "Example value"
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
            $data = $this->patientDOCFolderService->getDOCFolders($patient, $perPage);

            return $this->successResponse([
                'folders' => PatientDOCFolderResource::collection($data['folders']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Patient Document Folders: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientDOCFolder
     *
     * @method POST
     *
     * Create a new patientdocfolder
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Example: "Example Title"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam ParentFolderId string required. Maximum length: 255. Example: "Example ParentFolderId"
     * @bodyParam FolderTypeId string required. Maximum length: 255. Example: "Example FolderTypeId"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam FolderPath string required. Example: "Example FolderPath"
     * @bodyParam PartitionId string required. Maximum length: 255. Example: "Example PartitionId"
     * @bodyParam RowGuid string required. Maximum length: 255. Example: "1"
     * @bodyParam FolderType string required. Example: "Example FolderType"
     * @bodyParam Owner string required. Example: "Example Owner"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "folder": {
     *                 "folder_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_folder_id": 1,
     *                 "folder_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "folder_path": "Example value",
     *                 "partition_id": 1,
     *                 "row_guid": 1,
     *                 "folder_type": "Example value",
     *                 "owner": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDOCFolderResource
     */
    public function store(StorePatientDOCFolderRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $folder = $this->patientDOCFolderService->createDOCFolder($validatedData);

            return $this->successResponse([
                'message' => 'Patient document folder created successfully',
                'folder' => new PatientDOCFolderResource($folder)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating patient document folder: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create patient document folder',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientDOCFolder
     *
     * @method PUT
     *
     * Update an existing patientdocfolder
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientdocfolder to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Example: "Example Title"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam ParentFolderId string optional. Maximum length: 255. Example: "Example ParentFolderId"
     * @bodyParam FolderTypeId string optional. Maximum length: 255. Example: "Example FolderTypeId"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam FolderPath string optional. Example: "Example FolderPath"
     * @bodyParam PartitionId string optional. Maximum length: 255. Example: "Example PartitionId"
     * @bodyParam RowGuid string optional. Maximum length: 255. Example: "1"
     * @bodyParam FolderType string optional. Example: "Example FolderType"
     * @bodyParam Owner string optional. Example: "Example Owner"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "folder": {
     *                 "folder_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "description": "Example value",
     *                 "parent_folder_id": 1,
     *                 "folder_type_id": 1,
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "folder_path": "Example value",
     *                 "partition_id": 1,
     *                 "row_guid": 1,
     *                 "folder_type": "Example value",
     *                 "owner": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientDOCFolderResource
     */
    public function update(UpdatePatientDOCFolderRequest $request, PatientDOCFolder $patientDOCFolder)
    {
        try {
            $validatedData = $request->validated();

            $updatedFolder = $this->patientDOCFolderService->updateDOCFolder($patientDOCFolder, $validatedData);

            return $this->successResponse([
                'message' => 'Patient document folder updated successfully',
                'folder' => new PatientDOCFolderResource($updatedFolder)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating patient document folder: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update patient document folder',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
