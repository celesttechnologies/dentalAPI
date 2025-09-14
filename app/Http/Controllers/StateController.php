<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Services\StateService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Resources\StateResource;
use Illuminate\Support\Facades\Log;

class StateController extends Controller
{
    use ApiResponse;

    public function __construct(
        private StateService $stateService
    ) {

    }

    /**
     * @group State
     *
     * @method GET
     *
     * List all state
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "states": [
     *                 {
     *                     "id": 1,
     *                     "country_id": 1,
     *                     "state_code": "Example value",
     *                     "state_desc": "Example value"
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

            $stateList = $this->stateService->getStates($perPage);

            return $this->successResponse(['states' => StateResource::collection($stateList['states']), 'pagination' => $stateList['pagination']]);
        } catch (Exception $e) {
            // Catch any exception and return a generic error message
            return $this->errorResponse(['message' => 'Something went wrong. Please try again later.']);
        }
    }

    /**
     * @group State
     *
     * @method GET
     *
     * Create state
     *
     * @get /create
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @group State
     *
     * @method POST
     *
     * Create a new state
     *
     * @post /
     *
     * @bodyParam CountryID string required. Maximum length: 255. Example: "Example CountryID"
     * @bodyParam StateCode string required. Example: "Example StateCode"
     * @bodyParam StateDesc string required. Example: "Example StateDesc"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $state = $this->stateService->createState($validatedData);

            return $this->successResponse([
                'message' => 'State created successfully',
                'state' => $state
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating state: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create state',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group State
     *
     * @method GET
     *
     * Get a specific state
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the state to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * @group State
     *
     * @method GET
     *
     * Edit state
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the state to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * @group State
     *
     * @method PUT
     *
     * Update an existing state
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the state to update. Example: 1
     *
     * @bodyParam CountryID string optional. Maximum length: 255. Example: "Example CountryID"
     * @bodyParam StateCode string optional. Example: "Example StateCode"
     * @bodyParam StateDesc string optional. Example: "Example StateDesc"
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        try {
            $validatedData = $request->validated();

            $updatedState = $this->stateService->updateState($state, $validatedData);

            return $this->successResponse([
                'message' => 'State updated successfully',
                'state' => $updatedState
            ]);
        } catch (Exception $e) {
            Log::error('Error updating state: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update state',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group State
     *
     * @method DELETE
     *
     * Delete a state
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the state to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
