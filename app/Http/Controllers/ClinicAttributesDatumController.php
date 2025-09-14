<?php

namespace App\Http\Controllers;

use App\Models\ClinicAttributesDatum;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicAttributesDatumService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicAttributesDatumResource;
use App\Http\Requests\StoreClinicAttributesDatumRequest;
use App\Http\Requests\UpdateClinicAttributesDatumRequest;

class ClinicAttributesDatumController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicAttributesDatumService $clinicAttributesDatumService)
    {
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method GET
     *
     * List all clinicattributesdatum
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": [
     *                 {
     *                     "clinic_attribute_data_id": 1,
     *                     "clinic_id": 1,
     *                     "attribute_name": "Example Name",
     *                     "attribute_value": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
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

            $data = $this->clinicAttributesDatumService->getClinicAttributesData($perPage);

            return $this->successResponse([
                'clinic_attributes_data' => ClinicAttributesDatumResource::collection($data['clinic_attributes_data']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic attributes data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ClinicAttributesDatum
     *
     * @method GET
     *
     * Create clinicattributesdatum
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": {
     *                 "clinic_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_value": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesDatumResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method POST
     *
     * Create a new clinicattributesdatum
     *
     * @post /
     *
     * @bodyParam ClinicAttributesDatumID string required. Maximum length: 255. Example: "Example ClinicAttributesDatumID"
     * @bodyParam ClinicAttributeMasterID string required. Maximum length: 255. Example: "Example ClinicAttributeMasterID"
     * @bodyParam Value string required. Example: "Example Value"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": {
     *                 "clinic_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_value": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesDatumResource
     */
    public function store(StoreClinicAttributesDatumRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $attributeData = $this->clinicAttributesDatumService->createAttributeData($validatedData);

            return $this->successResponse([
                'message' => 'Clinic attribute data created successfully',
                'clinic_attributes_data' => new ClinicAttributesDatumResource($attributeData)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic attribute data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic attribute data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method GET
     *
     * Get a specific clinicattributesdatum
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesdatum to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": {
     *                 "clinic_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_value": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesDatumResource
     */
    public function show(ClinicAttributesDatum $clinicAttributesDatum)
    {
        //
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method GET
     *
     * Edit clinicattributesdatum
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinicattributesdatum to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": {
     *                 "clinic_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_value": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicAttributesDatumResource
     */
    public function edit(ClinicAttributesDatum $clinicAttributesDatum)
    {
        //
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method PUT
     *
     * Update an existing clinicattributesdatum
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesdatum to update. Example: 1
     *
     * @bodyParam ClinicAttributesDatumID string optional. Maximum length: 255. Example: "Example ClinicAttributesDatumID"
     * @bodyParam ClinicAttributeMasterID string optional. Maximum length: 255. Example: "Example ClinicAttributeMasterID"
     * @bodyParam Value string optional. Example: "Example Value"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. nullable. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. nullable. Maximum length: 255. Example: "Example LastUpdatedBy"
     * @bodyParam rowguid string optional. nullable. Maximum length: 255. Example: "1"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_attributes_data": {
     *                 "clinic_attribute_data_id": 1,
     *                 "clinic_id": 1,
     *                 "attribute_name": "Example Name",
     *                 "attribute_value": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
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
     * @return ClinicAttributesDatumResource
     */
    public function update(UpdateClinicAttributesDatumRequest $request, ClinicAttributesDatum $clinicAttributesDatum)
    {
        try {
            $validatedData = $request->validated();

            $updatedAttributeData = $this->clinicAttributesDatumService->updateAttributeData($clinicAttributesDatum, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic attribute data updated successfully',
                'clinic_attributes_data' => new ClinicAttributesDatumResource($updatedAttributeData)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic attribute data: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic attribute data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicAttributesDatum
     *
     * @method DELETE
     *
     * Delete a clinicattributesdatum
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinicattributesdatum to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicAttributesDatum $clinicAttributesDatum)
    {
        //
    }
}
