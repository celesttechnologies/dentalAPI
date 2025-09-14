<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientClinicRequest;
use App\Http\Requests\UpdateClientClinicRequest;
use App\Http\Resources\ClientClinicResource;
use App\Models\ClientClinic;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ClientClinicService;
use Illuminate\Support\Facades\Log;

class ClientClinicController extends Controller
{
    use ApiResponse;

    public function __construct(private ClientClinicService $clientClinicService)
    {
    }

    /**
     * @group ClientClinic
     *
     * @method GET
     *
     * List all clientclinic
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

            $clientClinics = $this->clientClinicService->getClientClinics($perPage);

            return $this->successResponse([
                'clientClinics' => $clientClinics['clientClinics'],
                'pagination' => $clientClinics['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching client clinics: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ClientClinic
     *
     * @method GET
     *
     * Create clientclinic
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client_clinic": {
     *                 "client_clinic_id": 1,
     *                 "client_id": 1,
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientClinicResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ClientClinic
     *
     * @method POST
     *
     * Create a new clientclinic
     *
     * @post /
     *
     * @bodyParam ClientID string required. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam RelationshipType string required. Maximum length: 100. Example: "Example RelationshipType"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "client_clinic": {
     *                 "client_clinic_id": 1,
     *                 "client_id": 1,
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientClinicResource
     */
    public function store(StoreClientClinicRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $clientClinic = $this->clientClinicService->createClientClinic($validatedData);

            return $this->successResponse([
                'message' => 'Client clinic relationship created successfully',
                'client_clinic' => new ClientClinicResource($clientClinic)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating client clinic relationship: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create client clinic relationship',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClientClinic
     *
     * @method GET
     *
     * Get a specific clientclinic
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the clientclinic to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client_clinic": {
     *                 "client_clinic_id": 1,
     *                 "client_id": 1,
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientClinicResource
     */
    public function show(ClientClinic $clientClinic)
    {
        //
    }

    /**
     * @group ClientClinic
     *
     * @method GET
     *
     * Edit clientclinic
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the clientclinic to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client_clinic": {
     *                 "client_clinic_id": 1,
     *                 "client_id": 1,
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientClinicResource
     */
    public function edit(ClientClinic $clientClinic)
    {
        //
    }

    /**
     * @group ClientClinic
     *
     * @method PUT
     *
     * Update an existing clientclinic
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the clientclinic to update. Example: 1
     *
     * @bodyParam ClientID string optional. Maximum length: 255. Example: "Example ClientID"
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam RelationshipType string optional. Maximum length: 100. Example: "Example RelationshipType"
     * @bodyParam CreatedOn string optional. nullable. date. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. nullable. Maximum length: 255. Example: "Example CreatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "client_clinic": {
     *                 "client_clinic_id": 1,
     *                 "client_id": 1,
     *                 "clinic_id": 1
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ClientClinicResource
     */
    public function update(UpdateClientClinicRequest $request, ClientClinic $clientClinic)
    {
        try {
            $validatedData = $request->validated();

            $updatedClientClinic = $this->clientClinicService->updateClientClinic($clientClinic, $validatedData);

            return $this->successResponse([
                'message' => 'Client clinic relationship updated successfully',
                'client_clinic' => new ClientClinicResource($updatedClientClinic)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating client clinic relationship: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update client clinic relationship',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ClientClinic
     *
     * @method DELETE
     *
     * Delete a clientclinic
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the clientclinic to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientClinic $clientClinic)
    {
        //
    }
}
