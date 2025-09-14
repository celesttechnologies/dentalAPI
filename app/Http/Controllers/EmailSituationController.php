<?php

namespace App\Http\Controllers;

use App\Models\EmailSituation;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\EmailSituationService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\EmailSituationResource;
use App\Http\Requests\StoreEmailSituationRequest;
use App\Http\Requests\UpdateEmailSituationRequest;

class EmailSituationController extends Controller
{
    use ApiResponse;

    public function __construct(private EmailSituationService $situationService)
    {
    }

    /**
     * @group EmailSituation
     *
     * @method GET
     *
     * List all emailsituation
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "email_situations": [
     *                 {
     *                     "id": 1,
     *                     "situation_code": "Example value",
     *                     "situation_description": "Example value",
     *                     "detailed_triggering_description": "Example value",
     *                     "situation_type": "Example value",
     *                     "dependent_field_1": "Example value",
     *                     "dependent_field_2": "Example value",
     *                     "dependent_field_3": "Example value",
     *                     "dependent_field_4": "Example value",
     *                     "is_active": true,
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
            $data = $this->situationService->getEmailSituations($perPage);

            return $this->successResponse([
                'email_situations' => EmailSituationResource::collection($data['situations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Email Situations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group EmailSituation
     *
     * @method GET
     *
     * Create emailsituation
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": {
     *                 "id": 1,
     *                 "situation_code": "Example value",
     *                 "situation_description": "Example value",
     *                 "detailed_triggering_description": "Example value",
     *                 "situation_type": "Example value",
     *                 "dependent_field_1": "Example value",
     *                 "dependent_field_2": "Example value",
     *                 "dependent_field_3": "Example value",
     *                 "dependent_field_4": "Example value",
     *                 "is_active": true,
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
     * @return EmailSituationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group EmailSituation
     *
     * @method POST
     *
     * Create a new emailsituation
     *
     * @post /
     *
     * @bodyParam SitutationCode string required. Example: "Example SitutationCode"
     * @bodyParam SituationDescription string required. Example: "Example SituationDescription"
     * @bodyParam DetailedTrigerringDeescription string required. Example: "Example DetailedTrigerringDeescription"
     * @bodyParam SituationType string required. Example: "Example SituationType"
     * @bodyParam DependentField1 string required. Example: "Example DependentField1"
     * @bodyParam DependentField2 string required. Example: "Example DependentField2"
     * @bodyParam DependentField3 string required. Example: "Example DependentField3"
     * @bodyParam DependentField4 string required. Example: "Example DependentField4"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam isDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": {
     *                 "id": 1,
     *                 "situation_code": "Example value",
     *                 "situation_description": "Example value",
     *                 "detailed_triggering_description": "Example value",
     *                 "situation_type": "Example value",
     *                 "dependent_field_1": "Example value",
     *                 "dependent_field_2": "Example value",
     *                 "dependent_field_3": "Example value",
     *                 "dependent_field_4": "Example value",
     *                 "is_active": true,
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
     * @return EmailSituationResource
     */
    public function store(StoreEmailSituationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $situation = $this->situationService->createEmailSituation($validatedData);

            return $this->successResponse([
                'message' => 'Email situation created successfully',
                'situation' => new EmailSituationResource($situation)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating email situation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create email situation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailSituation
     *
     * @method GET
     *
     * Get a specific emailsituation
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the emailsituation to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": {
     *                 "id": 1,
     *                 "situation_code": "Example value",
     *                 "situation_description": "Example value",
     *                 "detailed_triggering_description": "Example value",
     *                 "situation_type": "Example value",
     *                 "dependent_field_1": "Example value",
     *                 "dependent_field_2": "Example value",
     *                 "dependent_field_3": "Example value",
     *                 "dependent_field_4": "Example value",
     *                 "is_active": true,
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
     * @return EmailSituationResource
     */
    public function show(EmailSituation $emailSituation)
    {
        //
    }

    /**
     * @group EmailSituation
     *
     * @method GET
     *
     * Edit emailsituation
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the emailsituation to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": {
     *                 "id": 1,
     *                 "situation_code": "Example value",
     *                 "situation_description": "Example value",
     *                 "detailed_triggering_description": "Example value",
     *                 "situation_type": "Example value",
     *                 "dependent_field_1": "Example value",
     *                 "dependent_field_2": "Example value",
     *                 "dependent_field_3": "Example value",
     *                 "dependent_field_4": "Example value",
     *                 "is_active": true,
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
     * @return EmailSituationResource
     */
    public function edit(EmailSituation $emailSituation)
    {
        //
    }

    /**
     * @group EmailSituation
     *
     * @method PUT
     *
     * Update an existing emailsituation
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the emailsituation to update. Example: 1
     *
     * @bodyParam SitutationCode string optional. Example: "Example SitutationCode"
     * @bodyParam SituationDescription string optional. Example: "Example SituationDescription"
     * @bodyParam DetailedTrigerringDeescription string optional. Example: "Example DetailedTrigerringDeescription"
     * @bodyParam SituationType string optional. Example: "Example SituationType"
     * @bodyParam DependentField1 string optional. Example: "Example DependentField1"
     * @bodyParam DependentField2 string optional. Example: "Example DependentField2"
     * @bodyParam DependentField3 string optional. Example: "Example DependentField3"
     * @bodyParam DependentField4 string optional. Example: "Example DependentField4"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam isDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": {
     *                 "id": 1,
     *                 "situation_code": "Example value",
     *                 "situation_description": "Example value",
     *                 "detailed_triggering_description": "Example value",
     *                 "situation_type": "Example value",
     *                 "dependent_field_1": "Example value",
     *                 "dependent_field_2": "Example value",
     *                 "dependent_field_3": "Example value",
     *                 "dependent_field_4": "Example value",
     *                 "is_active": true,
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
     * @return EmailSituationResource
     */
    public function update(UpdateEmailSituationRequest $request, EmailSituation $emailSituation)
    {
        try {
            $validatedData = $request->validated();

            $updatedSituation = $this->situationService->updateEmailSituation($emailSituation, $validatedData);

            return $this->successResponse([
                'message' => 'Email situation updated successfully',
                'situation' => new EmailSituationResource($updatedSituation)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating email situation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update email situation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group EmailSituation
     *
     * @method DELETE
     *
     * Delete a emailsituation
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the emailsituation to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailSituation $emailSituation)
    {
        //
    }
}
