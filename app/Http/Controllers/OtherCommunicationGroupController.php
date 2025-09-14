<?php

namespace App\Http\Controllers;

use App\Models\OtherCommunicationGroup;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\OtherCommunicationGroupService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\OtherCommunicationGroupResource;
use App\Http\Requests\StoreOtherCommunicationGroupRequest;
use App\Http\Requests\UpdateOtherCommunicationGroupRequest;

class OtherCommunicationGroupController extends Controller
{
    use ApiResponse;

    public function __construct(private OtherCommunicationGroupService $communicationService)
    {
    }

    /**
     * @group OtherCommunicationGroup
     *
     * @method GET
     *
     * List all othercommunicationgroup
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "other_communication_groups": [
     *                 {
     *                     "other_communication_group": "Example value",
     *                     "communication_group_master_id": 1,
     *                     "first_name": "Example Name",
     *                     "last_name": "Example Name",
     *                     "mobile_number": "Example value",
     *                     "email_id": "user@example.com",
     *                     "group_type": "Example value",
     *                     "is_deleted": true,
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "group_source": "Example value",
     *                     "group_source_desc": "Example value",
     *                     "country_dial_code": "Example value"
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
            $data = $this->communicationService->getOtherCommunicationGroups($perPage);

            return $this->successResponse([
                'other_communication_groups' => OtherCommunicationGroupResource::collection($data['groups']),
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
     * @group OtherCommunicationGroup
     *
     * @method GET
     *
     * Create othercommunicationgroup
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "group": {
     *                 "other_communication_group": "Example value",
     *                 "communication_group_master_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "email_id": "user@example.com",
     *                 "group_type": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "group_source": "Example value",
     *                 "group_source_desc": "Example value",
     *                 "country_dial_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return OtherCommunicationGroupResource
     */
    public function create()
    {
        //
    }

    /**
     * @group OtherCommunicationGroup
     *
     * @method POST
     *
     * Create a new othercommunicationgroup
     *
     * @post /
     *
     * @bodyParam CommunicationGroupMasterID string required. Maximum length: 255. Example: "Example CommunicationGroupMasterID"
     * @bodyParam FirstName string required. Example: "Example FirstName"
     * @bodyParam LastName string required. Example: "Example LastName"
     * @bodyParam MobileNumber string required. Example: "Example MobileNumber"
     * @bodyParam EmailID string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailID"
     * @bodyParam GroupType string required. Example: "Example GroupType"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam GroupSource string required. Example: "Example GroupSource"
     * @bodyParam GroupSourceDesc string required. Example: "Example GroupSourceDesc"
     * @bodyParam CountryDialCode string required. Example: "Example CountryDialCode"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "group": {
     *                 "other_communication_group": "Example value",
     *                 "communication_group_master_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "email_id": "user@example.com",
     *                 "group_type": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "group_source": "Example value",
     *                 "group_source_desc": "Example value",
     *                 "country_dial_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return OtherCommunicationGroupResource
     */
    public function store(StoreOtherCommunicationGroupRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $group = $this->communicationService->createGroup($validatedData);

            return $this->successResponse([
                'message' => 'Communication group created successfully',
                'group' => new OtherCommunicationGroupResource($group)
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
     * @group OtherCommunicationGroup
     *
     * @method GET
     *
     * Get a specific othercommunicationgroup
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the othercommunicationgroup to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "group": {
     *                 "other_communication_group": "Example value",
     *                 "communication_group_master_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "email_id": "user@example.com",
     *                 "group_type": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "group_source": "Example value",
     *                 "group_source_desc": "Example value",
     *                 "country_dial_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return OtherCommunicationGroupResource
     */
    public function show(OtherCommunicationGroup $otherCommunicationGroup)
    {
        //
    }

    /**
     * @group OtherCommunicationGroup
     *
     * @method GET
     *
     * Edit othercommunicationgroup
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the othercommunicationgroup to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "group": {
     *                 "other_communication_group": "Example value",
     *                 "communication_group_master_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "email_id": "user@example.com",
     *                 "group_type": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "group_source": "Example value",
     *                 "group_source_desc": "Example value",
     *                 "country_dial_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return OtherCommunicationGroupResource
     */
    public function edit(OtherCommunicationGroup $otherCommunicationGroup)
    {
        //
    }

    /**
     * @group OtherCommunicationGroup
     *
     * @method PUT
     *
     * Update an existing othercommunicationgroup
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the othercommunicationgroup to update. Example: 1
     *
     * @bodyParam CommunicationGroupMasterID string optional. Maximum length: 255. Example: "Example CommunicationGroupMasterID"
     * @bodyParam FirstName string optional. Example: "Example FirstName"
     * @bodyParam LastName string optional. Example: "Example LastName"
     * @bodyParam MobileNumber string optional. Example: "Example MobileNumber"
     * @bodyParam EmailID string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailID"
     * @bodyParam GroupType string optional. Example: "Example GroupType"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam GroupSource string optional. Example: "Example GroupSource"
     * @bodyParam GroupSourceDesc string optional. Example: "Example GroupSourceDesc"
     * @bodyParam CountryDialCode string optional. Example: "Example CountryDialCode"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "group": {
     *                 "other_communication_group": "Example value",
     *                 "communication_group_master_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "mobile_number": "Example value",
     *                 "email_id": "user@example.com",
     *                 "group_type": "Example value",
     *                 "is_deleted": true,
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "group_source": "Example value",
     *                 "group_source_desc": "Example value",
     *                 "country_dial_code": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return OtherCommunicationGroupResource
     */
    public function update(UpdateOtherCommunicationGroupRequest $request, OtherCommunicationGroup $otherCommunicationGroup)
    {
        try {
            $validatedData = $request->validated();

            $updatedGroup = $this->communicationService->updateGroup($otherCommunicationGroup, $validatedData);

            return $this->successResponse([
                'message' => 'Communication group updated successfully',
                'group' => new OtherCommunicationGroupResource($updatedGroup)
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
     * @group OtherCommunicationGroup
     *
     * @method DELETE
     *
     * Delete a othercommunicationgroup
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the othercommunicationgroup to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherCommunicationGroup $otherCommunicationGroup)
    {
        //
    }
}
