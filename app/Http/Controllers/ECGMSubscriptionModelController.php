<?php

namespace App\Http\Controllers;

use App\Models\ECGMSubscriptionModel;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\ECGMSubscriptionModelService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ECGMSubscriptionModelResource;
use App\Http\Requests\StoreECGMSubscriptionModelRequest;
use App\Http\Requests\UpdateECGMSubscriptionModelRequest;

class ECGMSubscriptionModelController extends Controller
{
    use ApiResponse;

    public function __construct(private ECGMSubscriptionModelService $subscriptionService)
    {
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method GET
     *
     * List all ecgmsubscriptionmodel
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "subscriptions": [
     *                 {
     *                     "subscription_id": 1,
     *                     "user_id": 1,
     *                     "plan_id": 1,
     *                     "start_date": "Example value",
     *                     "end_date": "Example value",
     *                     "status": "Example value",
     *                     "created_on": "Example value",
     *                     "created_by": "Example value",
     *                     "last_updated_on": "Example value",
     *                     "last_updated_by": "Example value"
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

            $data = $this->subscriptionService->getSubscriptions($perPage);

            return $this->successResponse([
                'subscriptions' => ECGMSubscriptionModelResource::collection($data['subscriptions']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching ECGM subscriptions: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method GET
     *
     * Create ecgmsubscriptionmodel
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "subscription": {
     *                 "subscription_id": 1,
     *                 "user_id": 1,
     *                 "plan_id": 1,
     *                 "start_date": "Example value",
     *                 "end_date": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGMSubscriptionModelResource
     */
    public function create()
    {
        //
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method POST
     *
     * Create a new ecgmsubscriptionmodel
     *
     * @post /
     *
     * @bodyParam SubscriptionModelName string required. Example: "Example SubscriptionModelName"
     * @bodyParam SubscriptionPackageID string required. Maximum length: 255. Example: "Example SubscriptionPackageID"
     * @bodyParam SubscriptionTypeID string required. Maximum length: 255. Example: "Example SubscriptionTypeID"
     * @bodyParam OrderNumber string required. Example: "Example OrderNumber"
     * @bodyParam UsersLimit string required. Example: "Example UsersLimit"
     * @bodyParam ProvidersLimit string required. Maximum length: 255. Example: "1"
     * @bodyParam PatientsLimit string required. Example: "Example PatientsLimit"
     * @bodyParam AppointmentsLimit string required. Example: "Example AppointmentsLimit"
     * @bodyParam WAVisitsLimit string required. Example: "Example WAVisitsLimit"
     * @bodyParam DocumentSpaceLimit string required. Example: "Example DocumentSpaceLimit"
     * @bodyParam LicenseModuleCodeCSV string required. Example: "Example LicenseModuleCodeCSV"
     * @bodyParam IsActive string required. Example: "Example IsActive"
     * @bodyParam LastUpdatedOn string required. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string required. date. Example: "Example LastUpdatedBy"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "subscription": {
     *                 "subscription_id": 1,
     *                 "user_id": 1,
     *                 "plan_id": 1,
     *                 "start_date": "Example value",
     *                 "end_date": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGMSubscriptionModelResource
     */
    public function store(StoreECGMSubscriptionModelRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $subscription = $this->subscriptionService->createSubscription($validatedData);

            return $this->successResponse([
                'message' => 'Subscription model created successfully',
                'subscription' => new ECGMSubscriptionModelResource($subscription)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating subscription model: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create subscription model',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method GET
     *
     * Get a specific ecgmsubscriptionmodel
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the ecgmsubscriptionmodel to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "subscription": {
     *                 "subscription_id": 1,
     *                 "user_id": 1,
     *                 "plan_id": 1,
     *                 "start_date": "Example value",
     *                 "end_date": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGMSubscriptionModelResource
     */
    public function show(ECGMSubscriptionModel $eCGMSubscriptionModel)
    {
        //
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method GET
     *
     * Edit ecgmsubscriptionmodel
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the ecgmsubscriptionmodel to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "subscription": {
     *                 "subscription_id": 1,
     *                 "user_id": 1,
     *                 "plan_id": 1,
     *                 "start_date": "Example value",
     *                 "end_date": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGMSubscriptionModelResource
     */
    public function edit(ECGMSubscriptionModel $eCGMSubscriptionModel)
    {
        //
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method PUT
     *
     * Update an existing ecgmsubscriptionmodel
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the ecgmsubscriptionmodel to update. Example: 1
     *
     * @bodyParam SubscriptionModelName string optional. Example: "Example SubscriptionModelName"
     * @bodyParam SubscriptionPackageID string optional. Maximum length: 255. Example: "Example SubscriptionPackageID"
     * @bodyParam SubscriptionTypeID string optional. Maximum length: 255. Example: "Example SubscriptionTypeID"
     * @bodyParam OrderNumber string optional. Example: "Example OrderNumber"
     * @bodyParam UsersLimit string optional. Example: "Example UsersLimit"
     * @bodyParam ProvidersLimit string optional. Maximum length: 255. Example: "1"
     * @bodyParam PatientsLimit string optional. Example: "Example PatientsLimit"
     * @bodyParam AppointmentsLimit string optional. Example: "Example AppointmentsLimit"
     * @bodyParam WAVisitsLimit string optional. Example: "Example WAVisitsLimit"
     * @bodyParam DocumentSpaceLimit string optional. Example: "Example DocumentSpaceLimit"
     * @bodyParam LicenseModuleCodeCSV string optional. Example: "Example LicenseModuleCodeCSV"
     * @bodyParam IsActive string optional. Example: "Example IsActive"
     * @bodyParam LastUpdatedOn string optional. date. Example: "Example LastUpdatedOn"
     * @bodyParam LastUpdatedBy string optional. date. Example: "Example LastUpdatedBy"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "subscription": {
     *                 "subscription_id": 1,
     *                 "user_id": 1,
     *                 "plan_id": 1,
     *                 "start_date": "Example value",
     *                 "end_date": "Example value",
     *                 "status": "Example value",
     *                 "created_on": "Example value",
     *                 "created_by": "Example value",
     *                 "last_updated_on": "Example value",
     *                 "last_updated_by": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return ECGMSubscriptionModelResource
     */
    public function update(UpdateECGMSubscriptionModelRequest $request, ECGMSubscriptionModel $eCGMSubscriptionModel)
    {
        try {
            $validatedData = $request->validated();

            $updatedSubscription = $this->subscriptionService->updateSubscription($eCGMSubscriptionModel, $validatedData);

            return $this->successResponse([
                'message' => 'Subscription model updated successfully',
                'subscription' => new ECGMSubscriptionModelResource($updatedSubscription)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating subscription model: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update subscription model',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group ECGMSubscriptionModel
     *
     * @method DELETE
     *
     * Delete a ecgmsubscriptionmodel
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the ecgmsubscriptionmodel to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ECGMSubscriptionModel $eCGMSubscriptionModel)
    {
        //
    }
}
