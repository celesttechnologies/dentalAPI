<?php

namespace App\Http\Controllers;

use App\Models\CommunicationGroupMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\CommunicationGroupMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\CommunicationGroupMasterResource;
use App\Http\Requests\StoreCommunicationGroupMasterRequest;
use App\Http\Requests\UpdateCommunicationGroupMasterRequest;

class CommunicationGroupMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private CommunicationGroupMasterService $communicationGroupMasterService)
    {
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method GET
     *
     * List all communicationgroupmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communication_groups": [
     *                 {
     *                     "communication_group_guid": 1,
     *                     "group_name": "Example Name",
     *                     "clinic_id": 1,
     *                     "group_type": "Example value",
     *                     "group_description": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "is_patient_group": true,
     *                     "is_other_group": true
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

            $data = $this->communicationGroupMasterService->getCommunicationGroups($perPage);

            return $this->successResponse([
                'communication_groups' => CommunicationGroupMasterResource::collection($data['communication_groups']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching communication groups: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method GET
     *
     * Create communicationgroupmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communicationGroup": {
     *                 "communication_group_guid": 1,
     *                 "group_name": "Example Name",
     *                 "clinic_id": 1,
     *                 "group_type": "Example value",
     *                 "group_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_patient_group": true,
     *                 "is_other_group": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CommunicationGroupMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method POST
     *
     * Create a new communicationgroupmaster
     *
     * @post /
     *
     * @bodyParam CommunicationGroupMasterGuid string required. Maximum length: 255. Example: "1"
     * @bodyParam GroupName string optional. nullable. Maximum length: 255. Example: "Example GroupName"
     * @bodyParam ClinicID string optional. nullable. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GroupType number required. integer. Example: 1
     * @bodyParam GroupDescription string optional. nullable. Example: "Example GroupDescription"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. date. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsPatientGroup boolean optional. nullable. Example: true
     * @bodyParam IsOtherGroup boolean optional. nullable. Example: true
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "communicationGroup": {
     *                 "communication_group_guid": 1,
     *                 "group_name": "Example Name",
     *                 "clinic_id": 1,
     *                 "group_type": "Example value",
     *                 "group_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_patient_group": true,
     *                 "is_other_group": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CommunicationGroupMasterResource
     */
    public function store(StoreCommunicationGroupMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $communicationGroup = $this->communicationGroupMasterService->createCommunicationGroupMaster($validatedData);

            return $this->successResponse([
                'message' => 'Communication group created successfully',
                'communicationGroup' => new CommunicationGroupMasterResource($communicationGroup)
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
     * @group CommunicationGroupMaster
     *
     * @method GET
     *
     * Get a specific communicationgroupmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the communicationgroupmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communicationGroup": {
     *                 "communication_group_guid": 1,
     *                 "group_name": "Example Name",
     *                 "clinic_id": 1,
     *                 "group_type": "Example value",
     *                 "group_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_patient_group": true,
     *                 "is_other_group": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CommunicationGroupMasterResource
     */
    public function show(CommunicationGroupMaster $communicationGroupMaster)
    {
        //
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method GET
     *
     * Edit communicationgroupmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the communicationgroupmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communicationGroup": {
     *                 "communication_group_guid": 1,
     *                 "group_name": "Example Name",
     *                 "clinic_id": 1,
     *                 "group_type": "Example value",
     *                 "group_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_patient_group": true,
     *                 "is_other_group": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CommunicationGroupMasterResource
     */
    public function edit(CommunicationGroupMaster $communicationGroupMaster)
    {
        //
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method PUT
     *
     * Update an existing communicationgroupmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the communicationgroupmaster to update. Example: 1
     *
     * @bodyParam CommunicationGroupMasterGuid string optional. Maximum length: 255. Example: "1"
     * @bodyParam GroupName string optional. nullable. Maximum length: 255. Example: "Example GroupName"
     * @bodyParam ClinicID string optional. nullable. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam GroupType number optional. integer. Example: 1
     * @bodyParam GroupDescription string optional. nullable. Example: "Example GroupDescription"
     * @bodyParam IsDeleted boolean optional. nullable. Example: true
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. date. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam IsPatientGroup boolean optional. nullable. Example: true
     * @bodyParam IsOtherGroup boolean optional. nullable. Example: true
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "communicationGroup": {
     *                 "communication_group_guid": 1,
     *                 "group_name": "Example Name",
     *                 "clinic_id": 1,
     *                 "group_type": "Example value",
     *                 "group_description": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "is_patient_group": true,
     *                 "is_other_group": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CommunicationGroupMasterResource
     */
    public function update(UpdateCommunicationGroupMasterRequest $request, CommunicationGroupMaster $communicationGroupMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedCommunicationGroup = $this->communicationGroupMasterService->updateCommunicationGroupMaster($communicationGroupMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Communication group updated successfully',
                'communicationGroup' => new CommunicationGroupMasterResource($updatedCommunicationGroup)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating communication group: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update communication group',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group CommunicationGroupMaster
     *
     * @method DELETE
     *
     * Delete a communicationgroupmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the communicationgroupmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationGroupMaster $communicationGroupMaster)
    {
        //
    }
}
