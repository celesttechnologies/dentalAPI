<?php

namespace App\Http\Controllers;

use App\Models\ECGWebMessage;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGWebMessageService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGWebMessageResource;
use App\Http\Requests\StoreECGWebMessageRequest;
use App\Http\Requests\UpdateECGWebMessageRequest;

class ECGWebMessageController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGWebMessageService $webMessageService)
    {
    }

    /**
     * @group ECGWebMessage
     *
     * @method GET
     *
     * List all ecgwebmessage
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_messages": [
     *                 {
     *                     "message_id": 1,
     *                     "request_int_id": 1,
     *                     "request_type_id": 1,
     *                     "first_name": "Example Name",
     *                     "last_name": "Example Name",
     *                     "email": "user@example.com",
     *                     "contact_number": "Example value",
     *                     "clinic_name": "Example Name",
     *                     "clinic_address": "Example value",
     *                     "other_details": "Example value",
     *                     "message": "Example value",
     *                     "status": "Example value",
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

            $data = $this->webMessageService->getWebMessages($perPage);

            return $this->successResponse([
                'web_messages' => ECGWebMessageResource::collection($data['web_messages']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG Web Messages: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGWebMessage
     *
     * @method GET
     *
     * Create ecgwebmessage
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_message": {
     *                 "message_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
     *                 "message": "Example value",
     *                 "status": "Example value",
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
     * @return ECGWebMessageResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGWebMessage
     *
     * @method POST
     *
     * Create a new ecgwebmessage
     *
     * @post /
     *
     * @bodyParam RequestIntID string required. Maximum length: 255. Example: "Example RequestIntID"
     * @bodyParam RequestTypeID string required. Maximum length: 255. Example: "Example RequestTypeID"
     * @bodyParam FirstName string required. Example: "Example FirstName"
     * @bodyParam LastName string required. Example: "Example LastName"
     * @bodyParam Email string required. Must be a valid email address. Maximum length: 255. Example: "Example Email"
     * @bodyParam ContactNumber string required. Example: "Example ContactNumber"
     * @bodyParam ClinicName string required. Example: "Example ClinicName"
     * @bodyParam ClinicAddress string required. Example: "Example ClinicAddress"
     * @bodyParam OtherDetails string required. Example: "Example OtherDetails"
     * @bodyParam Message string required. Example: "Example Message"
     * @bodyParam status string required. Example: "Example Status"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "web_message": {
     *                 "message_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
     *                 "message": "Example value",
     *                 "status": "Example value",
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
     * @return ECGWebMessageResource
     */
    public function store(StoreECGWebMessageRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $webMessage = $this->webMessageService->createWebMessage($validatedData);

            return $this->successResponse([
                'message' => 'Web message created successfully',
                'web_message' => new ECGWebMessageResource($webMessage)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating web message: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create web message',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGWebMessage
     *
     * @method GET
     *
     * Get a specific ecgwebmessage
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebmessage to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_message": {
     *                 "message_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
     *                 "message": "Example value",
     *                 "status": "Example value",
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
     * @return ECGWebMessageResource
     */
    public function show(ECGWebMessage $eCGWebMessage)
    {
        //
    }

    /**
     * @group ECGWebMessage
     *
     * @method GET
     *
     * Edit ecgwebmessage
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgwebmessage to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_message": {
     *                 "message_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
     *                 "message": "Example value",
     *                 "status": "Example value",
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
     * @return ECGWebMessageResource
     */
    public function edit(ECGWebMessage $eCGWebMessage)
    {
        //
    }

    /**
     * @group ECGWebMessage
     *
     * @method PUT
     *
     * Update an existing ecgwebmessage
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebmessage to update. Example: 1
     *
     * @bodyParam RequestIntID string optional. Maximum length: 255. Example: "Example RequestIntID"
     * @bodyParam RequestTypeID string optional. Maximum length: 255. Example: "Example RequestTypeID"
     * @bodyParam FirstName string optional. Example: "Example FirstName"
     * @bodyParam LastName string optional. Example: "Example LastName"
     * @bodyParam Email string optional. Must be a valid email address. Maximum length: 255. Example: "Example Email"
     * @bodyParam ContactNumber string optional. Example: "Example ContactNumber"
     * @bodyParam ClinicName string optional. Example: "Example ClinicName"
     * @bodyParam ClinicAddress string optional. Example: "Example ClinicAddress"
     * @bodyParam OtherDetails string optional. Example: "Example OtherDetails"
     * @bodyParam Message string optional. Example: "Example Message"
     * @bodyParam status string optional. Example: "Example Status"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_message": {
     *                 "message_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
     *                 "message": "Example value",
     *                 "status": "Example value",
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
     * @return ECGWebMessageResource
     */
    public function update(UpdateECGWebMessageRequest $request, ECGWebMessage $eCGWebMessage)
    {
        try {
            $validatedData = $request->validated();

            $updatedMessage = $this->webMessageService->updateWebMessage($eCGWebMessage, $validatedData);

            return $this->successResponse([
                'message' => 'Web message updated successfully',
                'web_message' => new ECGWebMessageResource($updatedMessage)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating web message: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update web message',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGWebMessage
     *
     * @method DELETE
     *
     * Delete a ecgwebmessage
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebmessage to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGWebMessage $eCGWebMessage)
    {
        //
    }
}
