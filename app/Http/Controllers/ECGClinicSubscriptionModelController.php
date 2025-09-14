<?php

namespace App\Http\Controllers;

use App\Models\ECGClinicSubscriptionModel;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGClinicSubscriptionModelService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGClinicSubscriptionModelResource;
use App\Http\Requests\StoreECGClinicSubscriptionModelRequest;
use App\Http\Requests\UpdateECGClinicSubscriptionModelRequest;

class ECGClinicSubscriptionModelController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGClinicSubscriptionModelService $subscriptionService)
    {
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method GET
     *
     * List all ecgclinicsubscriptionmodel
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": [
     *             {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "email": "user@example.com",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "updated_at": "2025-05-19 04:57:26"
     *             }
     *         ]
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

            $data = $this->subscriptionService->getSubscriptions($perPage);

            return $this->successResponse([
                'subscriptions' => ECGClinicSubscriptionModelResource::collection($data['subscriptions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching clinic subscriptions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method GET
     *
     * Create ecgclinicsubscriptionmodel
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "id": 1,
     *             "name": "Example Name",
     *             "email": "user@example.com",
     *             "created_at": "2025-05-19 04:57:26",
     *             "updated_at": "2025-05-19 04:57:26"
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGClinicSubscriptionModelResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method POST
     *
     * Create a new ecgclinicsubscriptionmodel
     *
     * @post /
     *
     * @bodyParam ClinicID string required. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SubscriptionPackageID string required. Maximum length: 255. Example: "Example SubscriptionPackageID"
     * @bodyParam StartDate string required. date. Example: "Example StartDate"
     * @bodyParam EndDate string required. date. Example: "Example EndDate"
     * @bodyParam IsCurrentSubscription string required. Example: "Example IsCurrentSubscription"
     * @bodyParam CreatedOn string required. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string required. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "id": 1,
     *             "name": "Example Name",
     *             "email": "user@example.com",
     *             "created_at": "2025-05-19 04:57:26",
     *             "updated_at": "2025-05-19 04:57:26"
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGClinicSubscriptionModelResource
     */
    public function store(StoreECGClinicSubscriptionModelRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $subscription = $this->subscriptionService->createSubscription($validatedData);

            return $this->successResponse([
                'message' => 'Clinic subscription created successfully',
                'subscription' => new ECGClinicSubscriptionModelResource($subscription)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating clinic subscription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create clinic subscription',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method GET
     *
     * Get a specific ecgclinicsubscriptionmodel
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicsubscriptionmodel to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "id": 1,
     *             "name": "Example Name",
     *             "email": "user@example.com",
     *             "created_at": "2025-05-19 04:57:26",
     *             "updated_at": "2025-05-19 04:57:26"
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGClinicSubscriptionModelResource
     */
    public function show(ECGClinicSubscriptionModel $eCGClinicSubscriptionModel)
    {
        //
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method GET
     *
     * Edit ecgclinicsubscriptionmodel
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgclinicsubscriptionmodel to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "id": 1,
     *             "name": "Example Name",
     *             "email": "user@example.com",
     *             "created_at": "2025-05-19 04:57:26",
     *             "updated_at": "2025-05-19 04:57:26"
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGClinicSubscriptionModelResource
     */
    public function edit(ECGClinicSubscriptionModel $eCGClinicSubscriptionModel)
    {
        //
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method PUT
     *
     * Update an existing ecgclinicsubscriptionmodel
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicsubscriptionmodel to update. Example: 1
     *
     * @bodyParam ClinicID string optional. Maximum length: 255. Example: "Example ClinicID"
     * @bodyParam SubscriptionPackageID string optional. Maximum length: 255. Example: "Example SubscriptionPackageID"
     * @bodyParam StartDate string optional. date. Example: "Example StartDate"
     * @bodyParam EndDate string optional. date. Example: "Example EndDate"
     * @bodyParam IsCurrentSubscription string optional. Example: "Example IsCurrentSubscription"
     * @bodyParam CreatedOn string optional. Example: "Example CreatedOn"
     * @bodyParam CreatedBy string optional. Example: "Example CreatedBy"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "id": 1,
     *             "name": "Example Name",
     *             "email": "user@example.com",
     *             "created_at": "2025-05-19 04:57:26",
     *             "updated_at": "2025-05-19 04:57:26"
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGClinicSubscriptionModelResource
     */
    public function update(UpdateECGClinicSubscriptionModelRequest $request, ECGClinicSubscriptionModel $eCGClinicSubscriptionModel)
    {
        try {
            $validatedData = $request->validated();

            $updatedSubscription = $this->subscriptionService->updateSubscription($eCGClinicSubscriptionModel, $validatedData);

            return $this->successResponse([
                'message' => 'Clinic subscription updated successfully',
                'subscription' => new ECGClinicSubscriptionModelResource($updatedSubscription)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating clinic subscription: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update clinic subscription',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGClinicSubscriptionModel
     *
     * @method DELETE
     *
     * Delete a ecgclinicsubscriptionmodel
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgclinicsubscriptionmodel to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGClinicSubscriptionModel $eCGClinicSubscriptionModel)
    {
        //
    }
}
