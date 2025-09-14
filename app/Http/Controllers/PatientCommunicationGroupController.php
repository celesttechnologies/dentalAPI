<?php

namespace App\Http\Controllers;

use App\Models\PatientCommunicationGroup;
use Illuminate\Http\Request;
use App\Http\Requests\StorePatientCommunicationGroupRequest;
use App\Http\Requests\UpdatePatientCommunicationGroupRequest;
use App\Services\PatientCommunicationGroupService;
use App\Http\Resources\PatientCommunicationGroupResource;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * @group Patient
 * @subgroup CommunicationGroup
 * @subgroupDescription PatientCommunicationGroupController handles the CRUD operations for patient communication group controller.
 */
class PatientCommunicationGroupController extends Controller
{
    use ApiResponse;

    public function __construct(private PatientCommunicationGroupService $patientCommunicationGroupService)
    {
    }

    /**
     * @group PatientCommunicationGroup
     *
     * @method GET
     *
     * List all patientcommunicationgroup
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "groups": [
     *                 {
     *                     "id": 1,
     *                     "name": "Example Name",
     *                     "description": "Example value",
     *                     "is_active": true,
     *                     "clinic_id": 1,
     *                     "created_at": "2025-05-19 04:57:26",
     *                     "updated_at": "2025-05-19 04:57:26",
     *                     "patients": "Example value"
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
            $data = $this->patientCommunicationGroupService->getCommunicationGroup($perPage);

            return $this->successResponse([
                'groups' => PatientCommunicationGroupResource::collection($data['group']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Other Communication Groups: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group PatientCommunicationGroup
     *
     * @method POST
     *
     * Create a new patientcommunicationgroup
     *
     * @post /
     *
     * @bodyParam CommunicationGroupMasterGuid string required. Maximum length: 255. Example: "1"
     * @bodyParam PatientID string required. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GroupType string required. Example: "Example GroupType"
     * @bodyParam GroupName string required. Example: "Example GroupName"
     * @bodyParam GroupDescription string required. Example: "Example GroupDescription"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "communication_group": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "description": "Example value",
     *                 "is_active": true,
     *                 "clinic_id": 1,
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "patients": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientCommunicationGroupResource
     */
    public function store(StorePatientCommunicationGroupRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $communicationGroup = $this->patientCommunicationGroupService->createCommunicationGroup($validatedData);

            return $this->successResponse([
                'message' => 'Communication group created successfully',
                'communication_group' => new PatientCommunicationGroupResource($communicationGroup)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating communication group: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create communication group',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PatientCommunicationGroup
     *
     * @method PUT
     *
     * Update an existing patientcommunicationgroup
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the patientcommunicationgroup to update. Example: 1
     *
     * @bodyParam CommunicationGroupMasterGuid string optional. Maximum length: 255. Example: "1"
     * @bodyParam PatientID string optional. Maximum length: 255. Example: "Example PatientID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GroupType string optional. Example: "Example GroupType"
     * @bodyParam GroupName string optional. Example: "Example GroupName"
     * @bodyParam GroupDescription string optional. Example: "Example GroupDescription"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communication_group": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "description": "Example value",
     *                 "is_active": true,
     *                 "clinic_id": 1,
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26",
     *                 "patients": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PatientCommunicationGroupResource
     */
    public function update(UpdatePatientCommunicationGroupRequest $request, PatientCommunicationGroup $patientCommunicationGroup)
    {
        try {
            $validatedData = $request->validated();

            $updatedCommunicationGroup = $this->patientCommunicationGroupService->updateCommunicationGroup($patientCommunicationGroup, $validatedData);

            return $this->successResponse([
                'message' => 'Communication group updated successfully',
                'communication_group' => new PatientCommunicationGroupResource($updatedCommunicationGroup)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating communication group: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update communication group',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
