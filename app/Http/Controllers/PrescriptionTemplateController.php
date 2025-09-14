<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrescriptionTemplateResource; // Assuming you have a resource for Prescription Template
use App\Models\PrescriptionTemplate;
use App\Services\PrescriptionTemplateService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePrescriptionTemplateRequest;
use App\Http\Requests\UpdatePrescriptionTemplateRequest;

class PrescriptionTemplateController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PrescriptionTemplateService $prescriptionService)
    {
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method GET
     *
     * List all prescriptiontemplate
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "prescription_templates": [
     *                 {
     *                     "prescription_template_id": 1,
     *                     "clinic_id": 1,
     *                     "template_name": "Example Name",
     *                     "medicine_id": 1,
     *                     "medicine_name": "Example Name",
     *                     "frequency_id": 1,
     *                     "dosage": "Example value",
     *                     "duration": "Example value",
     *                     "drug_note": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "prescription_template_master_id": 1,
     *                     "frequency": "Example value",
     *                     "sequence_order": "Example value"
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
            $data = $this->prescriptionService->getPrescriptionTemplates($perPage);

            return $this->successResponse([
                'prescription_templates' => PrescriptionTemplateResource::collection($data['prescription_templates']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Prescription Templates: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method GET
     *
     * Create prescriptiontemplate
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "prescription_template_id": 1,
     *                 "clinic_id": 1,
     *                 "template_name": "Example Name",
     *                 "medicine_id": 1,
     *                 "medicine_name": "Example Name",
     *                 "frequency_id": 1,
     *                 "dosage": "Example value",
     *                 "duration": "Example value",
     *                 "drug_note": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "prescription_template_master_id": 1,
     *                 "frequency": "Example value",
     *                 "sequence_order": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PrescriptionTemplateResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method POST
     *
     * Create a new prescriptiontemplate
     *
     * @post /
     *
     * @bodyParam PrescriptionTemplateID string required. Maximum length: 255. Example: "Example PrescriptionTemplateID"
     * @bodyParam ClinicId string required. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam TemplateName string required. Example: "Example TemplateName"
     * @bodyParam MedicineId string required. Maximum length: 255. Example: "Example MedicineId"
     * @bodyParam MedicineName string required. Example: "Example MedicineName"
     * @bodyParam FrequencyId string required. Maximum length: 255. Example: "Example FrequencyId"
     * @bodyParam Dosage string required. Example: "Example Dosage"
     * @bodyParam Duration string required. Example: "Example Duration"
     * @bodyParam DrugNote string required. Example: "Example DrugNote"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam PrescriptionTemplateMasterID string required. Maximum length: 255. Example: "Example PrescriptionTemplateMasterID"
     * @bodyParam Frequency string required. Example: "Example Frequency"
     * @bodyParam SequenceOrder string required. Example: "Example SequenceOrder"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "prescription_template_id": 1,
     *                 "clinic_id": 1,
     *                 "template_name": "Example Name",
     *                 "medicine_id": 1,
     *                 "medicine_name": "Example Name",
     *                 "frequency_id": 1,
     *                 "dosage": "Example value",
     *                 "duration": "Example value",
     *                 "drug_note": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "prescription_template_master_id": 1,
     *                 "frequency": "Example value",
     *                 "sequence_order": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PrescriptionTemplateResource
     */
    public function store(StorePrescriptionTemplateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $template = $this->prescriptionService->createPrescriptionTemplate($validatedData);

            return $this->successResponse([
                'message' => 'Prescription template created successfully',
                'template' => new PrescriptionTemplateResource($template)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating prescription template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create prescription template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method GET
     *
     * Get a specific prescriptiontemplate
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplate to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "prescription_template_id": 1,
     *                 "clinic_id": 1,
     *                 "template_name": "Example Name",
     *                 "medicine_id": 1,
     *                 "medicine_name": "Example Name",
     *                 "frequency_id": 1,
     *                 "dosage": "Example value",
     *                 "duration": "Example value",
     *                 "drug_note": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "prescription_template_master_id": 1,
     *                 "frequency": "Example value",
     *                 "sequence_order": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PrescriptionTemplateResource
     */
    public function show(PrescriptionTemplate $prescriptionTemplate)
    {
        //
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method GET
     *
     * Edit prescriptiontemplate
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the prescriptiontemplate to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "prescription_template_id": 1,
     *                 "clinic_id": 1,
     *                 "template_name": "Example Name",
     *                 "medicine_id": 1,
     *                 "medicine_name": "Example Name",
     *                 "frequency_id": 1,
     *                 "dosage": "Example value",
     *                 "duration": "Example value",
     *                 "drug_note": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "prescription_template_master_id": 1,
     *                 "frequency": "Example value",
     *                 "sequence_order": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return PrescriptionTemplateResource
     */
    public function edit(PrescriptionTemplate $prescriptionTemplate)
    {
        //
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method PUT
     *
     * Update an existing prescriptiontemplate
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplate to update. Example: 1
     *
     * @bodyParam PrescriptionTemplateID string optional. Maximum length: 255. Example: "Example PrescriptionTemplateID"
     * @bodyParam ClinicId string optional. Maximum length: 255. Example: "Example ClinicId"
     * @bodyParam TemplateName string optional. Example: "Example TemplateName"
     * @bodyParam MedicineId string optional. Maximum length: 255. Example: "Example MedicineId"
     * @bodyParam MedicineName string optional. Example: "Example MedicineName"
     * @bodyParam FrequencyId string optional. Maximum length: 255. Example: "Example FrequencyId"
     * @bodyParam Dosage string optional. Example: "Example Dosage"
     * @bodyParam Duration string optional. Example: "Example Duration"
     * @bodyParam DrugNote string optional. Example: "Example DrugNote"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam PrescriptionTemplateMasterID string optional. Maximum length: 255. Example: "Example PrescriptionTemplateMasterID"
     * @bodyParam Frequency string optional. Example: "Example Frequency"
     * @bodyParam SequenceOrder string optional. Example: "Example SequenceOrder"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "prescription_template_id": 1,
     *                 "clinic_id": 1,
     *                 "template_name": "Example Name",
     *                 "medicine_id": 1,
     *                 "medicine_name": "Example Name",
     *                 "frequency_id": 1,
     *                 "dosage": "Example value",
     *                 "duration": "Example value",
     *                 "drug_note": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "prescription_template_master_id": 1,
     *                 "frequency": "Example value",
     *                 "sequence_order": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return PrescriptionTemplateResource
     */
    public function update(UpdatePrescriptionTemplateRequest $request, PrescriptionTemplate $prescriptionTemplate)
    {
        try {
            $validatedData = $request->validated();

            $updatedTemplate = $this->prescriptionService->updatePrescriptionTemplate($prescriptionTemplate, $validatedData);

            return $this->successResponse([
                'message' => 'Prescription template updated successfully',
                'template' => new PrescriptionTemplateResource($updatedTemplate)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating prescription template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update prescription template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PrescriptionTemplate
     *
     * @method DELETE
     *
     * Delete a prescriptiontemplate
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the prescriptiontemplate to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrescriptionTemplate $prescriptionTemplate)
    {
        //
    }
}
