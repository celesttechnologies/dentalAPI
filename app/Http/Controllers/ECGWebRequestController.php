<?php

namespace App\Http\Controllers;

use App\Models\ECGWebRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGWebRequestService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGWebRequestResource;
use App\Http\Requests\StoreECGWebRequestRequest;
use App\Http\Requests\UpdateECGWebRequestRequest;

class ECGWebRequestController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGWebRequestService $webRequestService)
    {
    }

    /**
     * @group ECGWebRequest
     *
     * @method GET
     *
     * List all ecgwebrequest
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_requests": [
     *                 {
     *                     "request_id": 1,
     *                     "request_int_id": 1,
     *                     "request_type_id": 1,
     *                     "first_name": "Example Name",
     *                     "last_name": "Example Name",
     *                     "email": "user@example.com",
     *                     "contact_number": "Example value",
     *                     "clinic_name": "Example Name",
     *                     "clinic_address": "Example value",
     *                     "other_details": "Example value",
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

            $data = $this->webRequestService->getWebRequests($perPage);

            return $this->successResponse([
                'web_requests' => ECGWebRequestResource::collection($data['web_requests']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG Web Requests: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group ECGWebRequest
     *
     * @method GET
     *
     * Create ecgwebrequest
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_request": {
     *                 "request_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
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
     * @return ECGWebRequestResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGWebRequest
     *
     * @method POST
     *
     * Create a new ecgwebrequest
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
     * @bodyParam status string required. Example: "Example Status"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "web_request": {
     *                 "request_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
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
     * @return ECGWebRequestResource
     */
    public function store(StoreECGWebRequestRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $webRequest = $this->webRequestService->createWebRequest($validatedData);

            return $this->successResponse([
                'message' => 'Web request created successfully',
                'web_request' => new ECGWebRequestResource($webRequest)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating web request: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create web request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGWebRequest
     *
     * @method GET
     *
     * Get a specific ecgwebrequest
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebrequest to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_request": {
     *                 "request_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
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
     * @return ECGWebRequestResource
     */
    public function show(ECGWebRequest $eCGWebRequest)
    {
        //
    }

    /**
     * @group ECGWebRequest
     *
     * @method GET
     *
     * Edit ecgwebrequest
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgwebrequest to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_request": {
     *                 "request_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
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
     * @return ECGWebRequestResource
     */
    public function edit(ECGWebRequest $eCGWebRequest)
    {
        //
    }

    /**
     * @group ECGWebRequest
     *
     * @method PUT
     *
     * Update an existing ecgwebrequest
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebrequest to update. Example: 1
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
     * @bodyParam status string optional. Example: "Example Status"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "web_request": {
     *                 "request_id": 1,
     *                 "request_int_id": 1,
     *                 "request_type_id": 1,
     *                 "first_name": "Example Name",
     *                 "last_name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_number": "Example value",
     *                 "clinic_name": "Example Name",
     *                 "clinic_address": "Example value",
     *                 "other_details": "Example value",
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
     * @return ECGWebRequestResource
     */
    public function update(UpdateECGWebRequestRequest $request, ECGWebRequest $eCGWebRequest)
    {
        try {
            $validatedData = $request->validated();

            $updatedWebRequest = $this->webRequestService->updateWebRequest($eCGWebRequest, $validatedData);

            return $this->successResponse([
                'message' => 'Web request updated successfully',
                'web_request' => new ECGWebRequestResource($updatedWebRequest)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating web request: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update web request',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGWebRequest
     *
     * @method DELETE
     *
     * Delete a ecgwebrequest
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgwebrequest to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGWebRequest $eCGWebRequest)
    {
        //
    }
}
