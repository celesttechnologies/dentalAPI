<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClientService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    use ApiResponse;

    public function __construct(private ClientService $clientService)
    {
    }

    /**
     * @group Client
     *
     * @method GET
     *
     * List all client
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

            $clients = $this->clientService->getClients($perPage);

            return $this->successResponse([
                'clients' => $clients['clients'],
                'pagination' => $clients['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clients: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }


    /**
     * @group Client
     *
     * @method GET
     *
     * Create client
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client": {
     *                 "client_id": 1,
     *                 "client_name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "description": "Example value",
     *                 "email": "user@example.com",
     *                 "fax": "Example value",
     *                 "final_description": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "no_of_clinics": "Example value",
     *                 "phone": "Example value",
     *                 "revenue": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Client
     *
     * @method POST
     *
     * Create a new client
     *
     * @post /
     *
     * @bodyParam ClientID string required. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam Name string required. Maximum length: 255. Example: "Example Name"
     * @bodyParam Email string required. Must be a valid email address. Example: "Example Email"
     * @bodyParam Phone string optional. nullable. Maximum length: 15. Example: "Example Phone"
     * @bodyParam Address string optional. nullable. Maximum length: 255. Example: "Example Address"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "client": {
     *                 "client_id": 1,
     *                 "client_name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "description": "Example value",
     *                 "email": "user@example.com",
     *                 "fax": "Example value",
     *                 "final_description": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "no_of_clinics": "Example value",
     *                 "phone": "Example value",
     *                 "revenue": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientResource
     */
    public function store(StoreClientRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $client = $this->clientService->createClient($validatedData);

            return $this->successResponse([
                'message' => 'Client created successfully',
                'client' => new ClientResource($client)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating client: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Client
     *
     * @method GET
     *
     * Get a specific client
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the client to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client": {
     *                 "client_id": 1,
     *                 "client_name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "description": "Example value",
     *                 "email": "user@example.com",
     *                 "fax": "Example value",
     *                 "final_description": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "no_of_clinics": "Example value",
     *                 "phone": "Example value",
     *                 "revenue": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientResource
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * @group Client
     *
     * @method GET
     *
     * Edit client
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the client to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client": {
     *                 "client_id": 1,
     *                 "client_name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "description": "Example value",
     *                 "email": "user@example.com",
     *                 "fax": "Example value",
     *                 "final_description": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "no_of_clinics": "Example value",
     *                 "phone": "Example value",
     *                 "revenue": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientResource
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * @group Client
     *
     * @method PUT
     *
     * Update an existing client
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the client to update. Example: 1
     *
     * @bodyParam ClientID string optional. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam Name string optional. Maximum length: 255. Example: "Example Name"
     * @bodyParam Email string optional. Must be a valid email address. Example: "Example Email"
     * @bodyParam Phone string optional. nullable. Maximum length: 15. Example: "Example Phone"
     * @bodyParam Address string optional. nullable. Maximum length: 255. Example: "Example Address"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client": {
     *                 "client_id": 1,
     *                 "client_name": "Example Name",
     *                 "address1": "Example value",
     *                 "address2": "Example value",
     *                 "city": "Example value",
     *                 "state": "Example value",
     *                 "country_id": 1,
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "description": "Example value",
     *                 "email": "user@example.com",
     *                 "fax": "Example value",
     *                 "final_description": "Example value",
     *                 "is_deleted": true,
     *                 "last_updated_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "no_of_clinics": "Example value",
     *                 "phone": "Example value",
     *                 "revenue": "Example value",
     *                 "rowguid": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientResource
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        try {
            $validatedData = $request->validated();

            $updatedClient = $this->clientService->updateClient($client, $validatedData);

            return $this->successResponse([
                'message' => 'Client updated successfully',
                'client' => new ClientResource($updatedClient)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating client: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update client',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Client
     *
     * @method DELETE
     *
     * Delete a client
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the client to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
