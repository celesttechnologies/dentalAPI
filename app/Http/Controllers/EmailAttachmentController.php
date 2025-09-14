<?php

namespace App\Http\Controllers;

use App\Models\EmailAttachment;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EmailAttachmentService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EmailAttachmentResource;
use App\Http\Requests\StoreEmailAttachmentRequest;
use App\Http\Requests\UpdateEmailAttachmentRequest;

class EmailAttachmentController extends Controller
{
    use ApiResponse;

    public function __construct(private EmailAttachmentService $attachmentService)
    {
    }

    /**
     * @group EmailAttachment
     *
     * @method GET
     *
     * List all emailattachment
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "email_attachments": [
     *                 {
     *                     "id": 1,
     *                     "attachment_path": "Example value"
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
            $data = $this->attachmentService->getEmailAttachments($perPage);

            return $this->successResponse([
                'email_attachments' => EmailAttachmentResource::collection($data['attachments']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Email Attachments: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EmailAttachment
     *
     * @method GET
     *
     * Create emailattachment
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attachment": {
     *                 "id": 1,
     *                 "attachment_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailAttachmentResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EmailAttachment
     *
     * @method POST
     *
     * Create a new emailattachment
     *
     * @post /
     *
     * @bodyParam AttachmentPath string required. Example: "Example AttachmentPath"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "attachment": {
     *                 "id": 1,
     *                 "attachment_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailAttachmentResource
     */
    public function store(StoreEmailAttachmentRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $attachment = $this->attachmentService->createEmailAttachment($validatedData);

            return $this->successResponse([
                'message' => 'Email attachment created successfully',
                'attachment' => new EmailAttachmentResource($attachment)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating email attachment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create email attachment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailAttachment
     *
     * @method GET
     *
     * Get a specific emailattachment
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the emailattachment to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attachment": {
     *                 "id": 1,
     *                 "attachment_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailAttachmentResource
     */
    public function show(EmailAttachment $emailAttachment)
    {
        //
    }

    /**
     * @group EmailAttachment
     *
     * @method GET
     *
     * Edit emailattachment
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the emailattachment to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attachment": {
     *                 "id": 1,
     *                 "attachment_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailAttachmentResource
     */
    public function edit(EmailAttachment $emailAttachment)
    {
        //
    }

    /**
     * @group EmailAttachment
     *
     * @method PUT
     *
     * Update an existing emailattachment
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the emailattachment to update. Example: 1
     *
     * @bodyParam AttachmentPath string optional. Example: "Example AttachmentPath"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "attachment": {
     *                 "id": 1,
     *                 "attachment_path": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return EmailAttachmentResource
     */
    public function update(UpdateEmailAttachmentRequest $request, EmailAttachment $emailAttachment)
    {
        try {
            $validatedData = $request->validated();

            $updatedAttachment = $this->attachmentService->updateEmailAttachment($emailAttachment, $validatedData);

            return $this->successResponse([
                'message' => 'Email attachment updated successfully',
                'attachment' => new EmailAttachmentResource($updatedAttachment)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating email attachment: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update email attachment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailAttachment
     *
     * @method DELETE
     *
     * Delete a emailattachment
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the emailattachment to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailAttachment $emailAttachment)
    {
        //
    }
}
