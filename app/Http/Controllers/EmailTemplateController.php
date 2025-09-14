<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EmailTemplateService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EmailTemplateResource;
use App\Http\Requests\StoreEmailTemplateRequest;
use App\Http\Requests\UpdateEmailTemplateRequest;

class EmailTemplateController extends Controller
{
    use ApiResponse;

    public function __construct(private EmailTemplateService $templateService)
    {
    }

    /**
     * @group EmailTemplate
     *
     * @method GET
     *
     * List all emailtemplate
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "email_templates": [
     *                 {
     *                     "id": 1,
     *                     "template_name": "Example Name",
     *                     "subject": "Example value",
     *                     "body": "Example value"
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
            $data = $this->templateService->getEmailTemplates($perPage);

            return $this->successResponse([
                'email_templates' => EmailTemplateResource::collection($data['templates']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Email Templates: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EmailTemplate
     *
     * @method GET
     *
     * Create emailtemplate
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "id": 1,
     *                 "template_name": "Example Name",
     *                 "subject": "Example value",
     *                 "body": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplateResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EmailTemplate
     *
     * @method POST
     *
     * Create a new emailtemplate
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SituationID string required. Maximum length: 255. Example: "Example SituationID"
     * @bodyParam EmailCategoryID string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailCategoryID"
     * @bodyParam FromEmailID string required. Must be a valid email address. Maximum length: 255. Example: "Example FromEmailID"
     * @bodyParam BCCEmailID string required. Must be a valid email address. Maximum length: 255. Example: "Example BCCEmailID"
     * @bodyParam SubjectEnglish string required. Example: "Example SubjectEnglish"
     * @bodyParam BodyEnglish string required. Example: "Example BodyEnglish"
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
     *             "template": {
     *                 "id": 1,
     *                 "template_name": "Example Name",
     *                 "subject": "Example value",
     *                 "body": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplateResource
     */
    public function store(StoreEmailTemplateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $template = $this->templateService->createEmailTemplate($validatedData);

            return $this->successResponse([
                'message' => 'Email template created successfully',
                'template' => new EmailTemplateResource($template)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating email template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create email template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTemplate
     *
     * @method GET
     *
     * Get a specific emailtemplate
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplate to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "id": 1,
     *                 "template_name": "Example Name",
     *                 "subject": "Example value",
     *                 "body": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplateResource
     */
    public function show(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * @group EmailTemplate
     *
     * @method GET
     *
     * Edit emailtemplate
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the emailtemplate to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "template": {
     *                 "id": 1,
     *                 "template_name": "Example Name",
     *                 "subject": "Example value",
     *                 "body": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplateResource
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        //
    }

    /**
     * @group EmailTemplate
     *
     * @method PUT
     *
     * Update an existing emailtemplate
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplate to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SituationID string optional. Maximum length: 255. Example: "Example SituationID"
     * @bodyParam EmailCategoryID string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailCategoryID"
     * @bodyParam FromEmailID string optional. Must be a valid email address. Maximum length: 255. Example: "Example FromEmailID"
     * @bodyParam BCCEmailID string optional. Must be a valid email address. Maximum length: 255. Example: "Example BCCEmailID"
     * @bodyParam SubjectEnglish string optional. Example: "Example SubjectEnglish"
     * @bodyParam BodyEnglish string optional. Example: "Example BodyEnglish"
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
     *             "template": {
     *                 "id": 1,
     *                 "template_name": "Example Name",
     *                 "subject": "Example value",
     *                 "body": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplateResource
     */
    public function update(UpdateEmailTemplateRequest $request, EmailTemplate $emailTemplate)
    {
        try {
            $validatedData = $request->validated();

            $updatedTemplate = $this->templateService->updateEmailTemplate($emailTemplate, $validatedData);

            return $this->successResponse([
                'message' => 'Email template updated successfully',
                'template' => new EmailTemplateResource($updatedTemplate)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating email template: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update email template',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTemplate
     *
     * @method DELETE
     *
     * Delete a emailtemplate
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplate to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }
}
