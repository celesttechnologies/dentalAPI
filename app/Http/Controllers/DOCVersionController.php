<?php

namespace App\Http\Controllers;

use App\Models\DOCVersion;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\DOCVersionService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DOCVersionResource;
use App\Http\Requests\StoreDOCVersionRequest;
use App\Http\Requests\UpdateDOCVersionRequest;

class DOCVersionController extends Controller
{
    use ApiResponse;

    public function __construct(private DOCVersionService $docVersionService)
    {
    }

    /**
     * @group DOCVersion
     *
     * @method GET
     *
     * List all docversion
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_versions": [
     *                 {
     *                     "id": 1,
     *                     "document_id": 1,
     *                     "version_number": "Example value",
     *                     "category_id": 1,
     *                     "sub_category_id": 1,
     *                     "status_id": 1,
     *                     "patient_id": 1,
     *                     "document_type": "Example value",
     *                     "description": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "publish_on": "Example value",
     *                     "expiration_on": "Example value",
     *                     "related_version_id": 1,
     *                     "related_version_number": "Example value",
     *                     "is_deleted": true,
     *                     "is_expired": true,
     *                     "file_name": "Example Name",
     *                     "uploaded_file_path": "Example value",
     *                     "physical_file_path": "Example value",
     *                     "ref_id1": 1
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
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));

            $data = $this->docVersionService->getDOCVersions($perPage);

            return $this->successResponse([
                'doc_versions' => DOCVersionResource::collection($data['doc_versions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching DOC versions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group DOCVersion
     *
     * @method GET
     *
     * Create docversion
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_version": {
     *                 "id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "category_id": 1,
     *                 "sub_category_id": 1,
     *                 "status_id": 1,
     *                 "patient_id": 1,
     *                 "document_type": "Example value",
     *                 "description": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "is_deleted": true,
     *                 "is_expired": true,
     *                 "file_name": "Example Name",
     *                 "uploaded_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "ref_id1": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DOCVersionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group DOCVersion
     *
     * @method POST
     *
     * Create a new docversion
     *
     * @post /
     *
     * @bodyParam DocumentID string required. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam VersionNumber string required. Example: "Example VersionNumber"
     * @bodyParam CategoryID string required. Maximum length: 255. Example: "Example CategoryID"
     * @bodyParam SubCategoryID string required. Maximum length: 255. Example: "Example SubCategoryID"
     * @bodyParam StatusID string required. Maximum length: 255. Example: "Example StatusID"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DocumentType string required. Example: "Example DocumentType"
     * @bodyParam Description string required. Example: "Example Description"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam PublishOn string required. Example: "Example PublishOn"
     * @bodyParam ExpirationOn string required. Example: "Example ExpirationOn"
     * @bodyParam RelatedVersionID string required. Maximum length: 255. Example: "Example RelatedVersionID"
     * @bodyParam RelatedVersionNumber string required. Example: "Example RelatedVersionNumber"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam IsExpired string required. Example: "Example IsExpired"
     * @bodyParam FileName string required. Example: "Example FileName"
     * @bodyParam UploadedFilePath string required. Example: "Example UploadedFilePath"
     * @bodyParam PhysicalFilePath string required. Example: "Example PhysicalFilePath"
     * @bodyParam RefId1 string required. Maximum length: 255. Example: "Example RefId1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_version": {
     *                 "id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "category_id": 1,
     *                 "sub_category_id": 1,
     *                 "status_id": 1,
     *                 "patient_id": 1,
     *                 "document_type": "Example value",
     *                 "description": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "is_deleted": true,
     *                 "is_expired": true,
     *                 "file_name": "Example Name",
     *                 "uploaded_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "ref_id1": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DOCVersionResource
     */
    public function store(StoreDOCVersionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $docVersion = $this->docVersionService->createDOCVersion($validatedData);

            return $this->successResponse([
                'message' => 'DOC version created successfully',
                'doc_version' => new DOCVersionResource($docVersion)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating DOC version: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create DOC version',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DOCVersion
     *
     * @method GET
     *
     * Get a specific docversion
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the docversion to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_version": {
     *                 "id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "category_id": 1,
     *                 "sub_category_id": 1,
     *                 "status_id": 1,
     *                 "patient_id": 1,
     *                 "document_type": "Example value",
     *                 "description": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "is_deleted": true,
     *                 "is_expired": true,
     *                 "file_name": "Example Name",
     *                 "uploaded_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "ref_id1": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DOCVersionResource
     */
    public function show(DOCVersion $dOCVersion)
    {
        //
    }

    /**
     * @group DOCVersion
     *
     * @method GET
     *
     * Edit docversion
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the docversion to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_version": {
     *                 "id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "category_id": 1,
     *                 "sub_category_id": 1,
     *                 "status_id": 1,
     *                 "patient_id": 1,
     *                 "document_type": "Example value",
     *                 "description": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "is_deleted": true,
     *                 "is_expired": true,
     *                 "file_name": "Example Name",
     *                 "uploaded_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "ref_id1": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return DOCVersionResource
     */
    public function edit(DOCVersion $dOCVersion)
    {
        //
    }

    /**
     * @group DOCVersion
     *
     * @method PUT
     *
     * Update an existing docversion
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the docversion to update. Example: 1
     *
     * @bodyParam DocumentID string optional. Maximum length: 255. Example: "Example DocumentID"
     * @bodyParam VersionNumber string optional. Example: "Example VersionNumber"
     * @bodyParam CategoryID string optional. Maximum length: 255. Example: "Example CategoryID"
     * @bodyParam SubCategoryID string optional. Maximum length: 255. Example: "Example SubCategoryID"
     * @bodyParam StatusID string optional. Maximum length: 255. Example: "Example StatusID"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam DocumentType string optional. Example: "Example DocumentType"
     * @bodyParam Description string optional. Example: "Example Description"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam PublishOn string optional. Example: "Example PublishOn"
     * @bodyParam ExpirationOn string optional. Example: "Example ExpirationOn"
     * @bodyParam RelatedVersionID string optional. Maximum length: 255. Example: "Example RelatedVersionID"
     * @bodyParam RelatedVersionNumber string optional. Example: "Example RelatedVersionNumber"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam IsExpired string optional. Example: "Example IsExpired"
     * @bodyParam FileName string optional. Example: "Example FileName"
     * @bodyParam UploadedFilePath string optional. Example: "Example UploadedFilePath"
     * @bodyParam PhysicalFilePath string optional. Example: "Example PhysicalFilePath"
     * @bodyParam RefId1 string optional. Maximum length: 255. Example: "Example RefId1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "doc_version": {
     *                 "id": 1,
     *                 "document_id": 1,
     *                 "version_number": "Example value",
     *                 "category_id": 1,
     *                 "sub_category_id": 1,
     *                 "status_id": 1,
     *                 "patient_id": 1,
     *                 "document_type": "Example value",
     *                 "description": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "publish_on": "Example value",
     *                 "expiration_on": "Example value",
     *                 "related_version_id": 1,
     *                 "related_version_number": "Example value",
     *                 "is_deleted": true,
     *                 "is_expired": true,
     *                 "file_name": "Example Name",
     *                 "uploaded_file_path": "Example value",
     *                 "physical_file_path": "Example value",
     *                 "ref_id1": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return DOCVersionResource
     */
    public function update(UpdateDOCVersionRequest $request, DOCVersion $dOCVersion)
    {
        try {
            $validatedData = $request->validated();

            $updatedDOCVersion = $this->docVersionService->updateDOCVersion($dOCVersion, $validatedData);

            return $this->successResponse([
                'message' => 'DOC version updated successfully',
                'doc_version' => new DOCVersionResource($updatedDOCVersion)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating DOC version: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update DOC version',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group DOCVersion
     *
     * @method DELETE
     *
     * Delete a docversion
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the docversion to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DOCVersion $dOCVersion)
    {
        //
    }
}
