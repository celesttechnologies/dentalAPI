<?php

namespace App\Http\Controllers;

use App\Models\ClinicSearchAgent;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClinicSearchAgentService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClinicSearchAgentResource;
use App\Http\Requests\StoreClinicSearchAgentRequest;
use App\Http\Requests\UpdateClinicSearchAgentRequest;

class ClinicSearchAgentController extends Controller
{
    use ApiResponse;

    public function __construct(private ClinicSearchAgentService $clinicSearchAgentService)
    {
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method GET
     *
     * List all clinicsearchagent
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agents": [
     *                 {
     *                     "id": 1,
     *                     "clinic_id": 1,
     *                     "agent_name": "Example Name",
     *                     "agent_purpose_id": 1,
     *                     "agent_details": "Example value",
     *                     "is_deleted": true,
     *                     "created_on": "Example value",
     *                     "created_by": "Example value"
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

            $data = $this->clinicSearchAgentService->getClinicSearchAgents($perPage);

            return $this->successResponse([
                'clinic_search_agents' => ClinicSearchAgentResource::collection($data['clinic_search_agents']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic search agents: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method GET
     *
     * Create clinicsearchagent
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agent": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "agent_name": "Example Name",
     *                 "agent_purpose_id": 1,
     *                 "agent_details": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicSearchAgentResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method POST
     *
     * Create a new clinicsearchagent
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam AgentName string required. Example: "Example AgentName"
     * @bodyParam AgentPurposeID string required. Maximum length: 255. Example: "Example AgentPurposeID"
     * @bodyParam AgentDetails string required. Example: "Example AgentDetails"
     * @bodyParam IsDeleted string required. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agent": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "agent_name": "Example Name",
     *                 "agent_purpose_id": 1,
     *                 "agent_details": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicSearchAgentResource
     */
    public function store(StoreClinicSearchAgentRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $searchAgent = $this->clinicSearchAgentService->createSearchAgent($validatedData);

            return $this->successResponse([
                'message' => 'Clinic search agent created successfully',
                'clinic_search_agent' => new ClinicSearchAgentResource($searchAgent)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic search agent: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic search agent',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method GET
     *
     * Get a specific clinicsearchagent
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clinicsearchagent to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agent": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "agent_name": "Example Name",
     *                 "agent_purpose_id": 1,
     *                 "agent_details": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicSearchAgentResource
     */
    public function show(ClinicSearchAgent $clinicSearchAgent)
    {
        //
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method GET
     *
     * Edit clinicsearchagent
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clinicsearchagent to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agent": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "agent_name": "Example Name",
     *                 "agent_purpose_id": 1,
     *                 "agent_details": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicSearchAgentResource
     */
    public function edit(ClinicSearchAgent $clinicSearchAgent)
    {
        //
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method PUT
     *
     * Update an existing clinicsearchagent
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clinicsearchagent to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam AgentName string optional. Example: "Example AgentName"
     * @bodyParam AgentPurposeID string optional. Maximum length: 255. Example: "Example AgentPurposeID"
     * @bodyParam AgentDetails string optional. Example: "Example AgentDetails"
     * @bodyParam IsDeleted string optional. Example: "Example IsDeleted"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "clinic_search_agent": {
     *                 "id": 1,
     *                 "clinic_id": 1,
     *                 "agent_name": "Example Name",
     *                 "agent_purpose_id": 1,
     *                 "agent_details": "Example value",
     *                 "is_deleted": true,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClinicSearchAgentResource
     */
    public function update(UpdateClinicSearchAgentRequest $request, ClinicSearchAgent $clinicSearchAgent)
    {
        try {
            $validatedData = $request->validated();

            $updatedSearchAgent = $this->clinicSearchAgentService->updateSearchAgent($clinicSearchAgent, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic search agent updated successfully',
                'clinic_search_agent' => new ClinicSearchAgentResource($updatedSearchAgent)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic search agent: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic search agent',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClinicSearchAgent
     *
     * @method DELETE
     *
     * Delete a clinicsearchagent
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clinicsearchagent to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicSearchAgent $clinicSearchAgent)
    {
        //
    }
}
