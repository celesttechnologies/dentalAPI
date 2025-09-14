<?php

namespace App\Http\Controllers;

use App\Models\ClinicAttributesMaster;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicAttributesMasterService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicAttributesMasterResource;
use App\Http\Requests\StoreClinicAttributesMasterRequest;
use App\Http\Requests\UpdateClinicAttributesMasterRequest;

class ClinicAttributesMasterController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicAttributesMasterService $clinicAttributesMasterService)
    {
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method GET
     *
     * List all clinicattributesmaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_masters": [
     *                 {
     *                     "clinic_attribute_master_id": 1,
     *                     "attribute_name": "Example Name",
     *                     "attribute_description": "Example value",
     *                     "importance": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "rowguid": 1
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

            $data = $this->clinicAttributesMasterService->getClinicAttributesMasters($perPage);

            return $this->successResponse([
                'clinic_attributes_masters' => ClinicAttributesMasterResource::collection($data['clinic_attributes_masters']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic attributes masters: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method GET
     *
     * Create clinicattributesmaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_master": {
     *                 "clinic_attribute_master_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_description": "Example value",
     *                 "importance": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method POST
     *
     * Create a new clinicattributesmaster
     *
     * @post /
     *
     * @bodyParam AttributeName string required. Maximum length: 255. Example: "Example AttributeName"
     * @bodyParam AttributeDescription string required. Maximum length: 255. Example: "Example AttributeDescription"
     * @bodyParam Importance string required. Example: "Example Importance"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_master": {
     *                 "clinic_attribute_master_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_description": "Example value",
     *                 "importance": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesMasterResource
     */
    public function store(StoreClinicAttributesMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $attributeMaster = $this->clinicAttributesMasterService->createAttributesMaster($validatedData);

            return $this->successResponse([
                'message' => 'Clinic attribute master created successfully',
                'clinic_attributes_master' => new ClinicAttributesMasterResource($attributeMaster)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic attribute master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic attribute master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method GET
     *
     * Get a specific clinicattributesmaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesmaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_master": {
     *                 "clinic_attribute_master_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_description": "Example value",
     *                 "importance": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesMasterResource
     */
    public function show(ClinicAttributesMaster $clinicAttributesMaster)
    {
        //
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method GET
     *
     * Edit clinicattributesmaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinicattributesmaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_master": {
     *                 "clinic_attribute_master_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_description": "Example value",
     *                 "importance": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesMasterResource
     */
    public function edit(ClinicAttributesMaster $clinicAttributesMaster)
    {
        //
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method PUT
     *
     * Update an existing clinicattributesmaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesmaster to update. Example: 1
     *
     * @bodyParam AttributeName string required. Maximum length: 255. Example: "Example AttributeName"
     * @bodyParam AttributeDescription string required. Maximum length: 255. Example: "Example AttributeDescription"
     * @bodyParam Importance string required. Example: "Example Importance"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_master": {
     *                 "clinic_attribute_master_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_description": "Example value",
     *                 "importance": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesMasterResource
     */
    public function update(UpdateClinicAttributesMasterRequest $request, ClinicAttributesMaster $clinicAttributesMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedAttributeMaster = $this->clinicAttributesMasterService->updateAttributesMaster($clinicAttributesMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic attribute master updated successfully',
                'clinic_attributes_master' => new ClinicAttributesMasterResource($updatedAttributeMaster)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic attribute master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic attribute master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicAttributesMaster
     *
     * @method DELETE
     *
     * Delete a clinicattributesmaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesmaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicAttributesMaster $clinicAttributesMaster)
    {
        //
    }
}
