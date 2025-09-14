<?php

namespace App\Http\Controllers;

use App\Models\UsersOriginal;
use App\Services\UsersOriginalService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class UsersOriginalController extends Controller
{
    use ApiResponse;

    public function __construct(private UsersOriginalService $usersOriginalService)
    {
    }

    /**
     * @group UsersOriginal
     *
     * @method GET
     *
     * List all usersoriginal
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->usersOriginalService->getUsersOriginal($perPage);

            return $this->successResponse($data);
        } catch (Exception $e) {
            Log::error('Error fetching UsersOriginal: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Unable to fetch users.',
                'error' => $e->getMessage(),
            ]);
        }
    }



    /**
     * @group UsersOriginal
     *
     * @method GET
     *
     * Create usersoriginal
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
     * @group UsersOriginal
     *
     * @method POST
     *
     * Create a new usersoriginal
     *
     * @post /
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @group UsersOriginal
     *
     * @method GET
     *
     * Get a specific usersoriginal
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the usersoriginal to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(UsersOriginal $usersOriginal)
    {
        //
    }

    /**
     * @group UsersOriginal
     *
     * @method GET
     *
     * Edit usersoriginal
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the usersoriginal to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersOriginal $usersOriginal)
    {
        //
    }

    /**
     * @group UsersOriginal
     *
     * @method PUT
     *
     * Update an existing usersoriginal
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the usersoriginal to update. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersOriginal $usersOriginal)
    {
        //
    }

    /**
     * @group UsersOriginal
     *
     * @method DELETE
     *
     * Delete a usersoriginal
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the usersoriginal to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersOriginal $usersOriginal)
    {
        //
    }
}
