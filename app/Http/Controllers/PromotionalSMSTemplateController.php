<?php

namespace App\Http\Controllers;

use App\Http\Resources\PromotionalSMSTTemplateResource; // Assuming you have a resource for Promotional SMS Template
use App\Models\PromotionalSMSTemplate;
use App\Services\PromotionalSMSTemplateService; // Assuming you have a service for handling business logic
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StorePromotionalSMSTemplateRequest;
use App\Http\Requests\UpdatePromotionalSMSTemplateRequest;

class PromotionalSMSTemplateController extends Controller
{
    use ApiResponse; // Use the ApiResponse trait for consistent API responses

    public function __construct(private PromotionalSMSTemplateService $promotionalSMSTemplateService)
    {
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method GET
     *
     * List all promotionalsmstemplate
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "promotional_sms_templates": [
     *                 {
     *                     "promotional_sms_template_id": 1,
     *                     "clinic_id": 1,
     *                     "title": "Example value",
     *                     "message": "Example value",
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
            $data = $this->promotionalSMSTemplateService->getPromotionalSMSTemplates($perPage);

            return $this->successResponse([
                'promotional_sms_templates' => PromotionalSMSTTemplateResource::collection($data['promotional_sms_templates']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Promotional SMS Templates: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group PromotionalSMSTemplate
     *
     * @method GET
     *
     * Create promotionalsmstemplate
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "promotional_sms_template_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "message": "Example value",
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
     * @return PromotionalSMSTTemplateResource
     */
    public function create()
    {
        //
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method POST
     *
     * Create a new promotionalsmstemplate
     *
     * @post /
     *
     * @bodyParam PromotionalSMSTemplateID string required. Maximum length: 255. Example: "Example PromotionalSMSTemplateID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string required. Example: "Example Title"
     * @bodyParam Message string required. Example: "Example Message"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "promotional_sms_template_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "message": "Example value",
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
     * @return PromotionalSMSTTemplateResource
     */
    public function store(StorePromotionalSMSTemplateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $template = $this->promotionalSMSTemplateService->createPromotionalTemplate($validatedData);

            return $this->successResponse([
                'message' => 'SMS template created successfully',
                'template' => new PromotionalSMSTTemplateResource($template)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating SMS template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create SMS template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method GET
     *
     * Get a specific promotionalsmstemplate
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the promotionalsmstemplate to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "promotional_sms_template_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "message": "Example value",
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
     * @return PromotionalSMSTTemplateResource
     */
    public function show(PromotionalSMSTemplate $promotionalSMSTemplate)
    {
        //
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method GET
     *
     * Edit promotionalsmstemplate
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the promotionalsmstemplate to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "promotional_sms_template_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "message": "Example value",
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
     * @return PromotionalSMSTTemplateResource
     */
    public function edit(PromotionalSMSTemplate $promotionalSMSTemplate)
    {
        //
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method PUT
     *
     * Update an existing promotionalsmstemplate
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the promotionalsmstemplate to update. Example: 1
     *
     * @bodyParam PromotionalSMSTemplateID string optional. Maximum length: 255. Example: "Example PromotionalSMSTemplateID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam Title string optional. Example: "Example Title"
     * @bodyParam Message string optional. Example: "Example Message"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "promotional_sms_template_id": 1,
     *                 "clinic_id": 1,
     *                 "title": "Example value",
     *                 "message": "Example value",
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
     * @return PromotionalSMSTTemplateResource
     */
    public function update(UpdatePromotionalSMSTemplateRequest $request, PromotionalSMSTemplate $promotionalSMSTemplate)
    {
        try {
            $validatedData = $request->validated();

            $updatedTemplate = $this->promotionalSMSTemplateService->updatePromotionalTemplate($promotionalSMSTemplate, $validatedData);

            return $this->successResponse([
                'message' => 'SMS template updated successfully',
                'template' => new PromotionalSMSTTemplateResource($updatedTemplate)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating SMS template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update SMS template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group PromotionalSMSTemplate
     *
     * @method DELETE
     *
     * Delete a promotionalsmstemplate
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the promotionalsmstemplate to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionalSMSTemplate $promotionalSMSTemplate)
    {
        //
    }
}
