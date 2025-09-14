<?php

namespace App\Http\Controllers;

use App\Http\Resources\SMSSituationResource;
use App\Models\SMSSituation;
use App\Services\SMSSituationService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSMSSituationRequest;
use App\Http\Requests\UpdateSMSSituationRequest;

class SMSSituationController extends Controller
{
    use ApiResponse;

    public function __construct(private SMSSituationService $situationService)
    {
    }

    /**
     * @group SMSSituation
     *
     * @method GET
     *
     * List all smssituation
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sms_situations": [
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
            $data = $this->situationService->getSMSSituations($perPage);

            return $this->successResponse([
                'sms_situations' => SMSSituationResource::collection($data['sms_situations']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching SMS Situations: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group SMSSituation
     *
     * @method GET
     *
     * Create smssituation
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSSituationResource
     */
    public function create()
    {
        //
    }

    /**
     * @group SMSSituation
     *
     * @method POST
     *
     * Create a new smssituation
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
     *             "situation": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSSituationResource
     */
    public function store(StoreSMSSituationRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $situation = $this->situationService->createSMSSituation($validatedData);

            return $this->successResponse([
                'message' => 'SMS situation created successfully',
                'situation' => new SMSSituationResource($situation)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating SMS situation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create SMS situation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSSituation
     *
     * @method GET
     *
     * Get a specific smssituation
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the smssituation to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSSituationResource
     */
    public function show(SMSSituation $sMSSituation)
    {
        //
    }

    /**
     * @group SMSSituation
     *
     * @method GET
     *
     * Edit smssituation
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the smssituation to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "situation": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSSituationResource
     */
    public function edit(SMSSituation $sMSSituation)
    {
        //
    }

    /**
     * @group SMSSituation
     *
     * @method PUT
     *
     * Update an existing smssituation
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the smssituation to update. Example: 1
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
     *             "situation": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SMSSituationResource
     */
    public function update(UpdateSMSSituationRequest $request, SMSSituation $sMSSituation)
    {
        try {
            $validatedData = $request->validated();

            $updatedSituation = $this->situationService->updateSMSSituation($sMSSituation, $validatedData);

            return $this->successResponse([
                'message' => 'SMS situation updated successfully',
                'situation' => new SMSSituationResource($updatedSituation)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating SMS situation: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update SMS situation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group SMSSituation
     *
     * @method DELETE
     *
     * Delete a smssituation
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the smssituation to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMSSituation $sMSSituation)
    {
        //
    }
}
