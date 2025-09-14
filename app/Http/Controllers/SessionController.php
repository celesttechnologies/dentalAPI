<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Traits\ApiResponse;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;

class SessionController extends Controller
{
    use ApiResponse;

    public function __construct(private SessionService $sessionService)
    {
    }

    /**
     * @group Session
     *
     * @method GET
     *
     * List all session
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "sessions": [
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
            $data = $this->sessionService->getSessions($perPage);

            return $this->successResponse([
                'sessions' => SessionResource::collection($data['sessions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Sessions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @group Session
     *
     * @method GET
     *
     * Create session
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "session": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SessionResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Session
     *
     * @method POST
     *
     * Create a new session
     *
     * @post /
     *
     * @bodyParam user_id string required. Maximum length: 255. Example: "1"
     * @bodyParam ip_address string required. Example: "Example Ip address"
     * @bodyParam user_agent string required. Example: "Example User agent"
     * @bodyParam payload string required. Example: "Example Payload"
     * @bodyParam last_activity string required. Example: "Example Last activity"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "session": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SessionResource
     */
    public function store(StoreSessionRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $session = $this->sessionService->createSession($validatedData);

            return $this->successResponse([
                'message' => 'Session created successfully',
                'session' => new SessionResource($session)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating session: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create session',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Session
     *
     * @method GET
     *
     * Get a specific session
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the session to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "session": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SessionResource
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * @group Session
     *
     * @method GET
     *
     * Edit session
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the session to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "session": []
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return SessionResource
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * @group Session
     *
     * @method PUT
     *
     * Update an existing session
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the session to update. Example: 1
     *
     * @bodyParam user_id string optional. Maximum length: 255. Example: "1"
     * @bodyParam ip_address string optional. Example: "Example Ip address"
     * @bodyParam user_agent string optional. Example: "Example User agent"
     * @bodyParam payload string optional. Example: "Example Payload"
     * @bodyParam last_activity string optional. Example: "Example Last activity"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "session": []
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return SessionResource
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        try {
            $validatedData = $request->validated();

            $updatedSession = $this->sessionService->updateSession($session, $validatedData);

            return $this->successResponse([
                'message' => 'Session updated successfully',
                'session' => new SessionResource($updatedSession)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating session: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update session',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Session
     *
     * @method DELETE
     *
     * Delete a session
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the session to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
