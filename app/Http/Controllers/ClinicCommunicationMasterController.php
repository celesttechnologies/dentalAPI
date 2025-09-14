<?php

namespace App\Http\Controllers;

use App\Models\ClinicCommunicationMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicCommunicationMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicCommunicationMasterResource;
use App\Http\Requests\StoreClinicCommunicationMasterRequest;
use App\Http\Requests\UpdateClinicCommunicationMasterRequest;

class ClinicCommunicationMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicCommunicationMasterService $clinicCommunicationMasterService)
    {
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method GET
     *
     * List all cliniccommunicationmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_masters": [
     *                 {
     *                     "clinic_communication_master_id": 1,
     *                     "communication_master_type_id": 1,
     *                     "communication_master_sub_type_id": 1,
     *                     "communication_master_sub_type_code": "Example value",
     *                     "category": "Example value",
     *                     "description": "Example value",
     *                     "communication_execution_type": "Example value",
     *                     "attribute1": "Example value",
     *                     "default_attribute_value1": "Example value",
     *                     "attribute2": "Example value",
     *                     "default_attribute_value2": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->clinicCommunicationMasterService->getClinicCommunicationMasters($perPage);

            return $this->successResponse([
                'clinic_communication_masters' => ClinicCommunicationMasterResource::collection($data['clinic_communication_masters']),
                'pagination' => $data['pagination']

            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic communication masters: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicCommunicationMaster
     *
     * @method GET
     *
     * Create cliniccommunicationmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_master": {
     *                 "clinic_communication_master_id": 1,
     *                 "communication_master_type_id": 1,
     *                 "communication_master_sub_type_id": 1,
     *                 "communication_master_sub_type_code": "Example value",
     *                 "category": "Example value",
     *                 "description": "Example value",
     *                 "communication_execution_type": "Example value",
     *                 "attribute1": "Example value",
     *                 "default_attribute_value1": "Example value",
     *                 "attribute2": "Example value",
     *                 "default_attribute_value2": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method POST
     *
     * Create a new cliniccommunicationmaster
     *
     * @post /
     *
     * @bodyParam ClinicCommunicationMasterID string required. Maximum length: 255. Example: "Example ClinicCommunicationMasterID"
     * @bodyParam CommunicationMasterTypeID number optional. nullable. integer. Example: 1
     * @bodyParam CommunicationMasterSubTypeID number optional. nullable. integer. Example: 1
     * @bodyParam CommunicationMasterSubTypeCode string optional. nullable. Maximum length: 50. Example: "Example CommunicationMasterSubTypeCode"
     * @bodyParam Category string optional. nullable. Maximum length: 100. Example: "Example Category"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam CommunicationExecutionType number optional. nullable. integer. Example: 1
     * @bodyParam Attribute1 string optional. nullable. Maximum length: 255. Example: "Example Attribute1"
     * @bodyParam DefaultAttributeValue1 string optional. nullable. Maximum length: 255. Example: "Example DefaultAttributeValue1"
     * @bodyParam Attribute2 string optional. nullable. Maximum length: 255. Example: "Example Attribute2"
     * @bodyParam DefaultAttributeValue2 string optional. nullable. Maximum length: 255. Example: "Example DefaultAttributeValue2"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_master": {
     *                 "clinic_communication_master_id": 1,
     *                 "communication_master_type_id": 1,
     *                 "communication_master_sub_type_id": 1,
     *                 "communication_master_sub_type_code": "Example value",
     *                 "category": "Example value",
     *                 "description": "Example value",
     *                 "communication_execution_type": "Example value",
     *                 "attribute1": "Example value",
     *                 "default_attribute_value1": "Example value",
     *                 "attribute2": "Example value",
     *                 "default_attribute_value2": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationMasterResource
     */
    public function store(StoreClinicCommunicationMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $communicationMaster = $this->clinicCommunicationMasterService->createClinicCommunicationMaster($validatedData);

            return $this->successResponse([
                'message' => 'Clinic communication master created successfully',
                'clinic_communication_master' => new ClinicCommunicationMasterResource($communicationMaster)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic communication master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic communication master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method GET
     *
     * Get a specific cliniccommunicationmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_master": {
     *                 "clinic_communication_master_id": 1,
     *                 "communication_master_type_id": 1,
     *                 "communication_master_sub_type_id": 1,
     *                 "communication_master_sub_type_code": "Example value",
     *                 "category": "Example value",
     *                 "description": "Example value",
     *                 "communication_execution_type": "Example value",
     *                 "attribute1": "Example value",
     *                 "default_attribute_value1": "Example value",
     *                 "attribute2": "Example value",
     *                 "default_attribute_value2": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationMasterResource
     */
    public function show(ClinicCommunicationMaster $clinicCommunicationMaster)
    {
        //
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method GET
     *
     * Edit cliniccommunicationmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the cliniccommunicationmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_master": {
     *                 "clinic_communication_master_id": 1,
     *                 "communication_master_type_id": 1,
     *                 "communication_master_sub_type_id": 1,
     *                 "communication_master_sub_type_code": "Example value",
     *                 "category": "Example value",
     *                 "description": "Example value",
     *                 "communication_execution_type": "Example value",
     *                 "attribute1": "Example value",
     *                 "default_attribute_value1": "Example value",
     *                 "attribute2": "Example value",
     *                 "default_attribute_value2": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationMasterResource
     */
    public function edit(ClinicCommunicationMaster $clinicCommunicationMaster)
    {
        //
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method PUT
     *
     * Update an existing cliniccommunicationmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationmaster to update. Example: 1
     *
     * @bodyParam ClinicCommunicationMasterID string optional. Maximum length: 255. Example: "Example ClinicCommunicationMasterID"
     * @bodyParam CommunicationMasterTypeID number optional. nullable. integer. Example: 1
     * @bodyParam CommunicationMasterSubTypeID number optional. nullable. integer. Example: 1
     * @bodyParam CommunicationMasterSubTypeCode string optional. nullable. Maximum length: 50. Example: "Example CommunicationMasterSubTypeCode"
     * @bodyParam Category string optional. nullable. Maximum length: 100. Example: "Example Category"
     * @bodyParam Description string optional. nullable. Example: "Example Description"
     * @bodyParam CommunicationExecutionType number optional. nullable. integer. Example: 1
     * @bodyParam Attribute1 string optional. nullable. Maximum length: 255. Example: "Example Attribute1"
     * @bodyParam DefaultAttributeValue1 string optional. nullable. Maximum length: 255. Example: "Example DefaultAttributeValue1"
     * @bodyParam Attribute2 string optional. nullable. Maximum length: 255. Example: "Example Attribute2"
     * @bodyParam DefaultAttributeValue2 string optional. nullable. Maximum length: 255. Example: "Example DefaultAttributeValue2"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_communication_master": {
     *                 "clinic_communication_master_id": 1,
     *                 "communication_master_type_id": 1,
     *                 "communication_master_sub_type_id": 1,
     *                 "communication_master_sub_type_code": "Example value",
     *                 "category": "Example value",
     *                 "description": "Example value",
     *                 "communication_execution_type": "Example value",
     *                 "attribute1": "Example value",
     *                 "default_attribute_value1": "Example value",
     *                 "attribute2": "Example value",
     *                 "default_attribute_value2": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicCommunicationMasterResource
     */
    public function update(UpdateClinicCommunicationMasterRequest $request, ClinicCommunicationMaster $clinicCommunicationMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedCommunicationMaster = $this->clinicCommunicationMasterService->updateClinicCommunicationMaster($clinicCommunicationMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic communication master updated successfully',
                'clinic_communication_master' => new ClinicCommunicationMasterResource($updatedCommunicationMaster)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic communication master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic communication master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicCommunicationMaster
     *
     * @method DELETE
     *
     * Delete a cliniccommunicationmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the cliniccommunicationmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicCommunicationMaster $clinicCommunicationMaster)
    {
        //
    }
}
