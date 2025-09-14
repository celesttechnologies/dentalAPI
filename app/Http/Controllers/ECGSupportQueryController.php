<?php

namespace App\Http\Controllers;

use App\Models\ECGSupportQuery;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGSupportQueryService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGSupportQueryResource;
use App\Http\Requests\StoreECGSupportQueryRequest;
use App\Http\Requests\UpdateECGSupportQueryRequest;

class ECGSupportQueryController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGSupportQueryService $queryService)
    {
    }

    /**
     * @group ECGSupportQuery
     *
     * @method GET
     *
     * List all ecgsupportquery
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "support_queries": [
     *                 {
     *                     "query_id": 1,
     *                     "name": "Example Name",
     *                     "email": "user@example.com",
     *                     "contact_no": "Example value",
     *                     "query": "Example value",
     *                     "clinic_id": 1,
     *                     "query_date": "Example value",
     *                     "city": "Example value",
     *                     "ip_address": "Example value"
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

            $data = $this->queryService->getSupportQueries($perPage);

            return $this->successResponse([
                'support_queries' => ECGSupportQueryResource::collection($data['support_queries']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECG Support Queries: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGSupportQuery
     *
     * @method GET
     *
     * Create ecgsupportquery
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "query": {
     *                 "query_id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_no": "Example value",
     *                 "query": "Example value",
     *                 "clinic_id": 1,
     *                 "query_date": "Example value",
     *                 "city": "Example value",
     *                 "ip_address": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGSupportQueryResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGSupportQuery
     *
     * @method POST
     *
     * Create a new ecgsupportquery
     *
     * @post /
     *
     * @bodyParam QueryID string required. Maximum length: 255. Example: "Example QueryID"
     * @bodyParam Name string required. Example: "Example Name"
     * @bodyParam EmailId string required. Must be a valid email address. Maximum length: 255. Example: "Example EmailId"
     * @bodyParam ContactNo string required. Example: "Example ContactNo"
     * @bodyParam Query string required. Example: "Example Query"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam QueryDate string required. date. Example: "Example QueryDate"
     * @bodyParam City string required. Example: "Example City"
     * @bodyParam IPAddress string required. Example: "Example IPAddress"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "query": {
     *                 "query_id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_no": "Example value",
     *                 "query": "Example value",
     *                 "clinic_id": 1,
     *                 "query_date": "Example value",
     *                 "city": "Example value",
     *                 "ip_address": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGSupportQueryResource
     */
    public function store(StoreECGSupportQueryRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $query = $this->queryService->createQuery($validatedData);

            return $this->successResponse([
                'message' => 'Support query created successfully',
                'query' => new ECGSupportQueryResource($query)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating support query: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create support query',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGSupportQuery
     *
     * @method GET
     *
     * Get a specific ecgsupportquery
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgsupportquery to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "query": {
     *                 "query_id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_no": "Example value",
     *                 "query": "Example value",
     *                 "clinic_id": 1,
     *                 "query_date": "Example value",
     *                 "city": "Example value",
     *                 "ip_address": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGSupportQueryResource
     */
    public function show(ECGSupportQuery $eCGSupportQuery)
    {
        //
    }

    /**
     * @group ECGSupportQuery
     *
     * @method GET
     *
     * Edit ecgsupportquery
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgsupportquery to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "query": {
     *                 "query_id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_no": "Example value",
     *                 "query": "Example value",
     *                 "clinic_id": 1,
     *                 "query_date": "Example value",
     *                 "city": "Example value",
     *                 "ip_address": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGSupportQueryResource
     */
    public function edit(ECGSupportQuery $eCGSupportQuery)
    {
        //
    }

    /**
     * @group ECGSupportQuery
     *
     * @method PUT
     *
     * Update an existing ecgsupportquery
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgsupportquery to update. Example: 1
     *
     * @bodyParam QueryID string optional. Maximum length: 255. Example: "Example QueryID"
     * @bodyParam Name string optional. Example: "Example Name"
     * @bodyParam EmailId string optional. Must be a valid email address. Maximum length: 255. Example: "Example EmailId"
     * @bodyParam ContactNo string optional. Example: "Example ContactNo"
     * @bodyParam Query string optional. Example: "Example Query"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam QueryDate string optional. date. Example: "Example QueryDate"
     * @bodyParam City string optional. Example: "Example City"
     * @bodyParam IPAddress string optional. Example: "Example IPAddress"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "query": {
     *                 "query_id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "contact_no": "Example value",
     *                 "query": "Example value",
     *                 "clinic_id": 1,
     *                 "query_date": "Example value",
     *                 "city": "Example value",
     *                 "ip_address": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGSupportQueryResource
     */
    public function update(UpdateECGSupportQueryRequest $request, ECGSupportQuery $eCGSupportQuery)
    {
        try {
            $validatedData = $request->validated();

            $updatedQuery = $this->queryService->updateQuery($eCGSupportQuery, $validatedData);

            return $this->successResponse([
                'message' => 'Support query updated successfully',
                'query' => new ECGSupportQueryResource($updatedQuery)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating support query: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update support query',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGSupportQuery
     *
     * @method DELETE
     *
     * Delete a ecgsupportquery
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgsupportquery to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGSupportQuery $eCGSupportQuery)
    {
        //
    }
}
