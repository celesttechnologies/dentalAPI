<?php

namespace App\Http\Controllers;

use App\Models\CTSecurity;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\CTSecurityService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\CTSecurityResource;
use App\Http\Requests\StoreCTSecurityRequest;
use App\Http\Requests\UpdateCTSecurityRequest;

class CTSecurityController extends Controller
{
    use ApiResponse;

    public function __construct(private CTSecurityService $ctSecurityService)
    {
    }

    /**
     * @group CTSecurity
     *
     * @method GET
     *
     * List all ctsecurity
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "ct_securities": [
     *                 {
     *                     "security_id": 1,
     *                     "object_type": "Example value",
     *                     "object_id": 1,
     *                     "object_details": "Example value",
     *                     "user_object_id": 1,
     *                     "user_object_type": "Example value",
     *                     "full_control": "Example value",
     *                     "write": "Example value",
     *                     "modify": "Example value",
     *                     "read_execute": "Example value",
     *                     "list_content": "Example value",
     *                     "read_only": "Example value",
     *                     "special_permissions": "Example value",
     *                     "created_by": "Example value",
     *                     "created_on": "Example value",
     *                     "last_updated_by": "Example value",
     *                     "last_updated_on": "Example value"
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

            $data = $this->ctSecurityService->getCTSecurities($perPage);

            return $this->successResponse([
                'ct_securities' => CTSecurityResource::collection($data['ct_securities']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching CT securities: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group CTSecurity
     *
     * @method GET
     *
     * Create ctsecurity
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "security": {
     *                 "security_id": 1,
     *                 "object_type": "Example value",
     *                 "object_id": 1,
     *                 "object_details": "Example value",
     *                 "user_object_id": 1,
     *                 "user_object_type": "Example value",
     *                 "full_control": "Example value",
     *                 "write": "Example value",
     *                 "modify": "Example value",
     *                 "read_execute": "Example value",
     *                 "list_content": "Example value",
     *                 "read_only": "Example value",
     *                 "special_permissions": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CTSecurityResource
     */
    public function create()
    {
        //
    }

    /**
     * @group CTSecurity
     *
     * @method POST
     *
     * Create a new ctsecurity
     *
     * @post /
     *
     * @bodyParam ObjectType string required. Example: "Example ObjectType"
     * @bodyParam ObjectID string required. Maximum length: 255. Example: "Example ObjectID"
     * @bodyParam ObjectDetails string required. Example: "Example ObjectDetails"
     * @bodyParam UserObjectID string required. Maximum length: 255. Example: "Example UserObjectID"
     * @bodyParam UserObjectType string required. Example: "Example UserObjectType"
     * @bodyParam FullControl string required. Example: "Example FullControl"
     * @bodyParam Write string required. Example: "Example Write"
     * @bodyParam Modify string required. Example: "Example Modify"
     * @bodyParam ReadExecute string required. Example: "Example ReadExecute"
     * @bodyParam ListContent string required. Example: "Example ListContent"
     * @bodyParam ReadOnly string required. Example: "Example ReadOnly"
     * @bodyParam SpecialPermissions string required. Example: "Example SpecialPermissions"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "security": {
     *                 "security_id": 1,
     *                 "object_type": "Example value",
     *                 "object_id": 1,
     *                 "object_details": "Example value",
     *                 "user_object_id": 1,
     *                 "user_object_type": "Example value",
     *                 "full_control": "Example value",
     *                 "write": "Example value",
     *                 "modify": "Example value",
     *                 "read_execute": "Example value",
     *                 "list_content": "Example value",
     *                 "read_only": "Example value",
     *                 "special_permissions": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CTSecurityResource
     */
    public function store(StoreCTSecurityRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $security = $this->ctSecurityService->createSecurity($validatedData);

            return $this->successResponse([
                'message' => 'Security record created successfully',
                'security' => new CTSecurityResource($security)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating security record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create security record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group CTSecurity
     *
     * @method GET
     *
     * Get a specific ctsecurity
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ctsecurity to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "security": {
     *                 "security_id": 1,
     *                 "object_type": "Example value",
     *                 "object_id": 1,
     *                 "object_details": "Example value",
     *                 "user_object_id": 1,
     *                 "user_object_type": "Example value",
     *                 "full_control": "Example value",
     *                 "write": "Example value",
     *                 "modify": "Example value",
     *                 "read_execute": "Example value",
     *                 "list_content": "Example value",
     *                 "read_only": "Example value",
     *                 "special_permissions": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CTSecurityResource
     */
    public function show(CTSecurity $cTSecurity)
    {
        //
    }

    /**
     * @group CTSecurity
     *
     * @method GET
     *
     * Edit ctsecurity
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ctsecurity to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "security": {
     *                 "security_id": 1,
     *                 "object_type": "Example value",
     *                 "object_id": 1,
     *                 "object_details": "Example value",
     *                 "user_object_id": 1,
     *                 "user_object_type": "Example value",
     *                 "full_control": "Example value",
     *                 "write": "Example value",
     *                 "modify": "Example value",
     *                 "read_execute": "Example value",
     *                 "list_content": "Example value",
     *                 "read_only": "Example value",
     *                 "special_permissions": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return CTSecurityResource
     */
    public function edit(CTSecurity $cTSecurity)
    {
        //
    }

    /**
     * @group CTSecurity
     *
     * @method PUT
     *
     * Update an existing ctsecurity
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ctsecurity to update. Example: 1
     *
     * @bodyParam ObjectType string optional. Example: "Example ObjectType"
     * @bodyParam ObjectID string optional. Maximum length: 255. Example: "Example ObjectID"
     * @bodyParam ObjectDetails string optional. Example: "Example ObjectDetails"
     * @bodyParam UserObjectID string optional. Maximum length: 255. Example: "Example UserObjectID"
     * @bodyParam UserObjectType string optional. Example: "Example UserObjectType"
     * @bodyParam FullControl string optional. Example: "Example FullControl"
     * @bodyParam Write string optional. Example: "Example Write"
     * @bodyParam Modify string optional. Example: "Example Modify"
     * @bodyParam ReadExecute string optional. Example: "Example ReadExecute"
     * @bodyParam ListContent string optional. Example: "Example ListContent"
     * @bodyParam ReadOnly string optional. Example: "Example ReadOnly"
     * @bodyParam SpecialPermissions string optional. Example: "Example SpecialPermissions"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "security": {
     *                 "security_id": 1,
     *                 "object_type": "Example value",
     *                 "object_id": 1,
     *                 "object_details": "Example value",
     *                 "user_object_id": 1,
     *                 "user_object_type": "Example value",
     *                 "full_control": "Example value",
     *                 "write": "Example value",
     *                 "modify": "Example value",
     *                 "read_execute": "Example value",
     *                 "list_content": "Example value",
     *                 "read_only": "Example value",
     *                 "special_permissions": "Example value",
     *                 "created_by": "Example value",
     *                 "created_on": "Example value",
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return CTSecurityResource
     */
    public function update(UpdateCTSecurityRequest $request, CTSecurity $cTSecurity)
    {
        try {
            $validatedData = $request->validated();

            $updatedSecurity = $this->ctSecurityService->updateSecurity($cTSecurity, $validatedData);

            return $this->successResponse([
                'message' => 'Security record updated successfully',
                'security' => new CTSecurityResource($updatedSecurity)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating security record: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update security record',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group CTSecurity
     *
     * @method DELETE
     *
     * Delete a ctsecurity
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ctsecurity to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CTSecurity $cTSecurity)
    {
        //
    }
}
