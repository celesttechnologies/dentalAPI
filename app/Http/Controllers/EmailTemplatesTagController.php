<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplatesTag;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EmailTemplatesTagService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EmailTemplatesTagResource;
use App\Http\Requests\StoreEmailTemplatesTagRequest;
use App\Http\Requests\UpdateEmailTemplatesTagRequest;

class EmailTemplatesTagController extends Controller
{
    use ApiResponse;

    public function __construct(private EmailTemplatesTagService $tagService)
    {
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method GET
     *
     * List all emailtemplatestag
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "email_templates_tags": [
     *                 {
     *                     "id": 1,
     *                     "email_tag_code": "user@example.com",
     *                     "email_tag_description": "user@example.com",
     *                     "email_tag_query": "user@example.com",
     *                     "is_deleted": true
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
            $data = $this->tagService->getEmailTemplatesTags($perPage);

            return $this->successResponse([
                'email_templates_tags' => EmailTemplatesTagResource::collection($data['tags']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Email Templates Tags: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method GET
     *
     * Create emailtemplatestag
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "tag": {
     *                 "id": 1,
     *                 "email_tag_code": "user@example.com",
     *                 "email_tag_description": "user@example.com",
     *                 "email_tag_query": "user@example.com",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplatesTagResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method POST
     *
     * Create a new emailtemplatestag
     *
     * @post /
     *
     * @bodyParam EmailTagCode string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagCode"
     * @bodyParam EmailTagDescription string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagDescription"
     * @bodyParam EmailTagQuery string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagQuery"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "tag": {
     *                 "id": 1,
     *                 "email_tag_code": "user@example.com",
     *                 "email_tag_description": "user@example.com",
     *                 "email_tag_query": "user@example.com",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplatesTagResource
     */
    public function store(StoreEmailTemplatesTagRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $tag = $this->tagService->createEmailTemplatesTag($validatedData);

            return $this->successResponse([
                'message' => 'Email template tag created successfully',
                'tag' => new EmailTemplatesTagResource($tag)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating email template tag: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create email template tag',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method GET
     *
     * Get a specific emailtemplatestag
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplatestag to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "tag": {
     *                 "id": 1,
     *                 "email_tag_code": "user@example.com",
     *                 "email_tag_description": "user@example.com",
     *                 "email_tag_query": "user@example.com",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplatesTagResource
     */
    public function show(EmailTemplatesTag $emailTemplatesTag)
    {
        //
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method GET
     *
     * Edit emailtemplatestag
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the emailtemplatestag to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "tag": {
     *                 "id": 1,
     *                 "email_tag_code": "user@example.com",
     *                 "email_tag_description": "user@example.com",
     *                 "email_tag_query": "user@example.com",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplatesTagResource
     */
    public function edit(EmailTemplatesTag $emailTemplatesTag)
    {
        //
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method PUT
     *
     * Update an existing emailtemplatestag
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplatestag to update. Example: 1
     *
     * @bodyParam EmailTagCode string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagCode"
     * @bodyParam EmailTagDescription string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagDescription"
     * @bodyParam EmailTagQuery string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailTagQuery"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "tag": {
     *                 "id": 1,
     *                 "email_tag_code": "user@example.com",
     *                 "email_tag_description": "user@example.com",
     *                 "email_tag_query": "user@example.com",
     *                 "is_deleted": true
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailTemplatesTagResource
     */
    public function update(UpdateEmailTemplatesTagRequest $request, EmailTemplatesTag $emailTemplatesTag)
    {
        try {
            $validatedData = $request->validated();

            $updatedTag = $this->tagService->updateEmailTemplatesTag($emailTemplatesTag, $validatedData);

            return $this->successResponse([
                'message' => 'Email template tag updated successfully',
                'tag' => new EmailTemplatesTagResource($updatedTag)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating email template tag: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update email template tag',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailTemplatesTag
     *
     * @method DELETE
     *
     * Delete a emailtemplatestag
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the emailtemplatestag to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplatesTag $emailTemplatesTag)
    {
        //
    }
}
