<?php

namespace App\Http\Controllers;

use App\Services\UserOriginalService;
use App\Http\Resources\UserOriginalResource;
use App\Models\UserOriginal;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Log;

class UserOriginalController extends Controller
{
    use ApiResponse;

    public function __construct(private UserOriginalService $userOriginalService)
    {
    }

    /**
     * @group UserOriginal
     *
     * @method GET
     *
     * List all useroriginal
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "users": [
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
            $data = $this->userOriginalService->getUserOriginals($perPage);

            return $this->successResponse([
                'users' => UserOriginalResource::collection($data['user_originals']),
                'pagination' => $data['pagination'],
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Unable to fetch users.',
                'error' => $e->getMessage(),
            ]);
        }
    }



    /**
     * @group UserOriginal
     *
     * @method GET
     *
     * Create useroriginal
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
     * @group UserOriginal
     *
     * @method POST
     *
     * Create a new useroriginal
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
     * @group UserOriginal
     *
     * @method GET
     *
     * Get a specific useroriginal
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the useroriginal to retrieve. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function show(UserOriginal $userOriginal)
    {
        //
    }

    /**
     * @group UserOriginal
     *
     * @method GET
     *
     * Edit useroriginal
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the useroriginal to use. Example: 1
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(UserOriginal $userOriginal)
    {
        //
    }

    /**
     * @group UserOriginal
     *
     * @method PUT
     *
     * Update an existing useroriginal
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the useroriginal to update. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserOriginal $userOriginal)
    {
        //
    }

    /**
     * @group UserOriginal
     *
     * @method DELETE
     *
     * Delete a useroriginal
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the useroriginal to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserOriginal $userOriginal)
    {
        //
    }
}
