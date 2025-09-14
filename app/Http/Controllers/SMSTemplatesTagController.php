<?php

namespace App\Http\Controllers;

use App\Http\Resources\SMSTemplateTagResource;
use App\Models\SMSTemplatesTag;
use App\Services\SMSTemplatesTagService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSMSTemplatesTagRequest;
use App\Http\Requests\UpdateSMSTemplatesTagRequest;

class SMSTemplatesTagController extends Controller
{
    use ApiResponse;

    public function __construct(private SMSTemplatesTagService $smsTemplatesTagService)
    {
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method GET
     *
     * List all smstemplatestag
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tags": [
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
            $data = $this->smsTemplatesTagService->getSMSTemplatesTags($perPage);

            return $this->successResponse([
                'sms_templates_tags' => SMSTemplateTagResource::collection($data['sms_templates_tags']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching SMS Template Tags: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @group SMSTemplatesTag
     *
     * @method GET
     *
     * Create smstemplatestag
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tag": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateTagResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method POST
     *
     * Create a new smstemplatestag
     *
     * @post /
     *
     * @bodyParam SMSTagCode string required. Example: "Example SMSTagCode"
     * @bodyParam SMSTagDescription string required. Example: "Example SMSTagDescription"
     * @bodyParam DefaultValue string required. Example: "Example DefaultValue"
     * @bodyParam SMSTagQuery string required. Example: "Example SMSTagQuery"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tag": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateTagResource
     */
    public function store(StoreSMSTemplatesTagRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $smsTemplatesTag = $this->smsTemplatesTagService->createSMSTemplatesTag($validatedData);

            return $this->successResponse([
                'message' => 'SMS Template Tag created successfully',
                'sms_templates_tag' => new SMSTemplateTagResource($smsTemplatesTag)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating SMS Template Tag: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create SMS Template Tag',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method GET
     *
     * Get a specific smstemplatestag
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the smstemplatestag to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tag": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateTagResource
     */
    public function show(SMSTemplatesTag $sMSTemplatesTag)
    {
        //
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method GET
     *
     * Edit smstemplatestag
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the smstemplatestag to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tag": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateTagResource
     */
    public function edit(SMSTemplatesTag $sMSTemplatesTag)
    {
        //
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method PUT
     *
     * Update an existing smstemplatestag
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the smstemplatestag to update. Example: 1
     *
     * @bodyParam SMSTagCode string optional. Example: "Example SMSTagCode"
     * @bodyParam SMSTagDescription string optional. Example: "Example SMSTagDescription"
     * @bodyParam DefaultValue string optional. Example: "Example DefaultValue"
     * @bodyParam SMSTagQuery string optional. Example: "Example SMSTagQuery"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_templates_tag": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSTemplateTagResource
     */
    public function update(UpdateSMSTemplatesTagRequest $request, SMSTemplatesTag $sMSTemplatesTag)
    {
        try {
            $validatedData = $request->validated();

            $updatedSMSTemplatesTag = $this->smsTemplatesTagService->updateSMSTemplatesTag($sMSTemplatesTag, $validatedData);

            return $this->successResponse([
                'message' => 'SMS Template Tag updated successfully',
                'sms_templates_tag' => new SMSTemplateTagResource($updatedSMSTemplatesTag)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating SMS Template Tag: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update SMS Template Tag',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSTemplatesTag
     *
     * @method DELETE
     *
     * Delete a smstemplatestag
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the smstemplatestag to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMSTemplatesTag $sMSTemplatesTag)
    {
        //
    }
}
