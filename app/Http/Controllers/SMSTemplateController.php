<?php

namespace App\Http\Controllers;

use App\Http\Resources\SMSTemplateResource;
use App\Models\SMSTemplate;
use App\Services\SMSTemplateService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSMSTemplateRequest;
use App\Http\Requests\UpdateSMSTemplateRequest;

class SMSTemplateController extends Controller
{
    use ApiResponse;

    public function __construct(private SMSTemplateService $smsTemplateService)
    {
    }

    /**
     * @group SMSTemplate
     *
     * @method GET
     *
     * List all smstemplate
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates": [
     *                 []
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
            $data = $this->smsTemplateService->getSMSTemplates($perPage);

            return $this->successResponse([
                'sms_templates' => SMSTemplateResource::collection($data['sms_templates']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching SMS Templates: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group SMSTemplate
     *
     * @method GET
     *
     * Create smstemplate
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SMSTemplate
     *
     * @method POST
     *
     * Create a new smstemplate
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SituationID string required. Maximum length: 255. Example: "Example SituationID"
     * @bodyParam SMSCategoryID string required. Maximum length: 255. Example: "Example SMSCategoryID"
     * @bodyParam FromPhoneNumber string required. Example: "Example FromPhoneNumber"
     * @bodyParam FromSenderID string required. Maximum length: 255. Example: "Example FromSenderID"
     * @bodyParam Message string required. Example: "Example Message"
     * @bodyParam EffectiveDate string required. date. Example: "Example EffectiveDate"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "template": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateResource
     */
    public function store(StoreSMSTemplateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $template = $this->smsTemplateService->createSMSTemplate($validatedData);

            return $this->successResponse([
                'message' => 'SMS template created successfully',
                'template' => new SMSTemplateResource($template)
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
     * @group SMSTemplate
     *
     * @method GET
     *
     * Get a specific smstemplate
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the smstemplate to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateResource
     */
    public function show(SMSTemplate $sMSTemplate)
    {
        //
    }

    /**
     * @group SMSTemplate
     *
     * @method GET
     *
     * Edit smstemplate
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the smstemplate to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateResource
     */
    public function edit(SMSTemplate $sMSTemplate)
    {
        //
    }

    /**
     * @group SMSTemplate
     *
     * @method PUT
     *
     * Update an existing smstemplate
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the smstemplate to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SituationID string optional. Maximum length: 255. Example: "Example SituationID"
     * @bodyParam SMSCategoryID string optional. Maximum length: 255. Example: "Example SMSCategoryID"
     * @bodyParam FromPhoneNumber string optional. Example: "Example FromPhoneNumber"
     * @bodyParam FromSenderID string optional. Maximum length: 255. Example: "Example FromSenderID"
     * @bodyParam Message string optional. Example: "Example Message"
     * @bodyParam EffectiveDate string optional. date. Example: "Example EffectiveDate"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateResource
     */
    public function update(UpdateSMSTemplateRequest $request, SMSTemplate $sMSTemplate)
    {
        try {
            $validatedData = $request->validated();

            $updatedTemplate = $this->smsTemplateService->updateSMSTemplate($sMSTemplate, $validatedData);

            return $this->successResponse([
                'message' => 'SMS template updated successfully',
                'template' => new SMSTemplateResource($updatedTemplate)
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
     * @group SMSTemplate
     *
     * @method DELETE
     *
     * Delete a smstemplate
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the smstemplate to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMSTemplate $sMSTemplate)
    {
        //
    }
}
