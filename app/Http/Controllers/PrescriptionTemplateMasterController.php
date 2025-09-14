<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrescriptionTemplateMasterResource; // Assuming you have a resource for Prescription Template Master
use App\Models\PrescriptionTemplateMaster;
use App\Services\PrescriptionTemplateMasterService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePrescriptionTemplateMasterRequest;
use App\Http\Requests\UpdatePrescriptionTemplateMasterRequest;

class PrescriptionTemplateMasterController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PrescriptionTemplateMasterService $templateMasterService)
    {
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method GET
     *
     * List all prescriptiontemplatemaster
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription_template_masters": [
     *                 {
     *                     "prescription_template_master_id": 1,
     *                     "prescription_template_name": "Example Name",
     *                     "prescription_template_desc": "Example value",
     *                     "prescription_note": "Example value",
     *                     "clinic_id": 1,
     *                     "is_deleted": true,
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
            $data = $this->templateMasterService->getPrescriptionTemplateMasters($perPage);

            return $this->successResponse([
                'prescription_template_masters' => PrescriptionTemplateMasterResource::collection($data['prescription_template_masters']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Prescription Template Masters: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method GET
     *
     * Create prescriptiontemplatemaster
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "templateMaster": {
     *                 "prescription_template_master_id": 1,
     *                 "prescription_template_name": "Example Name",
     *                 "prescription_template_desc": "Example value",
     *                 "prescription_note": "Example value",
     *                 "clinic_id": 1,
     *                 "is_deleted": true,
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
     * @return PrescriptionTemplateMasterResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method POST
     *
     * Create a new prescriptiontemplatemaster
     *
     * @post /
     *
     * @bodyParam PrescriptionTemplateMasterID string required. Maximum length: 255. Example: "Example PrescriptionTemplateMasterID"
     * @bodyParam PrescriptionTemplateName string required. Example: "Example PrescriptionTemplateName"
     * @bodyParam PrescriptionTemplateDesc string required. Example: "Example PrescriptionTemplateDesc"
     * @bodyParam PrescriptionNote string required. Example: "Example PrescriptionNote"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "templateMaster": {
     *                 "prescription_template_master_id": 1,
     *                 "prescription_template_name": "Example Name",
     *                 "prescription_template_desc": "Example value",
     *                 "prescription_note": "Example value",
     *                 "clinic_id": 1,
     *                 "is_deleted": true,
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
     * @return PrescriptionTemplateMasterResource
     */
    public function store(StorePrescriptionTemplateMasterRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $templateMaster = $this->templateMasterService->createPrescriptionTemplateMaster($validatedData);

            return $this->successResponse([
                'message' => 'Prescription template master created successfully',
                'templateMaster' => new PrescriptionTemplateMasterResource($templateMaster)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating prescription template master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create prescription template master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method GET
     *
     * Get a specific prescriptiontemplatemaster
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplatemaster to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "templateMaster": {
     *                 "prescription_template_master_id": 1,
     *                 "prescription_template_name": "Example Name",
     *                 "prescription_template_desc": "Example value",
     *                 "prescription_note": "Example value",
     *                 "clinic_id": 1,
     *                 "is_deleted": true,
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
     * @return PrescriptionTemplateMasterResource
     */
    public function show(PrescriptionTemplateMaster $prescriptionTemplateMaster)
    {
        //
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method GET
     *
     * Edit prescriptiontemplatemaster
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the prescriptiontemplatemaster to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "templateMaster": {
     *                 "prescription_template_master_id": 1,
     *                 "prescription_template_name": "Example Name",
     *                 "prescription_template_desc": "Example value",
     *                 "prescription_note": "Example value",
     *                 "clinic_id": 1,
     *                 "is_deleted": true,
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
     * @return PrescriptionTemplateMasterResource
     */
    public function edit(PrescriptionTemplateMaster $prescriptionTemplateMaster)
    {
        //
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method PUT
     *
     * Update an existing prescriptiontemplatemaster
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplatemaster to update. Example: 1
     *
     * @bodyParam PrescriptionTemplateMasterID string optional. Maximum length: 255. Example: "Example PrescriptionTemplateMasterID"
     * @bodyParam PrescriptionTemplateName string optional. Example: "Example PrescriptionTemplateName"
     * @bodyParam PrescriptionTemplateDesc string optional. Example: "Example PrescriptionTemplateDesc"
     * @bodyParam PrescriptionNote string optional. Example: "Example PrescriptionNote"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "templateMaster": {
     *                 "prescription_template_master_id": 1,
     *                 "prescription_template_name": "Example Name",
     *                 "prescription_template_desc": "Example value",
     *                 "prescription_note": "Example value",
     *                 "clinic_id": 1,
     *                 "is_deleted": true,
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
     * @return PrescriptionTemplateMasterResource
     */
    public function update(UpdatePrescriptionTemplateMasterRequest $request, PrescriptionTemplateMaster $prescriptionTemplateMaster)
    {
        try {
            $validatedData = $request->validated();

            $updatedTemplateMaster = $this->templateMasterService->updatePrescriptionTemplateMaster($prescriptionTemplateMaster, $validatedData);

            return $this->successResponse([
                'message' => 'Prescription template master updated successfully',
                'templateMaster' => new PrescriptionTemplateMasterResource($updatedTemplateMaster)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating prescription template master: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update prescription template master',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PrescriptionTemplateMaster
     *
     * @method DELETE
     *
     * Delete a prescriptiontemplatemaster
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplatemaster to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrescriptionTemplateMaster $prescriptionTemplateMaster)
    {
        //
    }
}
