<?php

namespace App\Services;

use App\Models\ECGClinicSubscriptionModel;
use App\Http\Resources\ECGClinicSubscriptionModelResource;

class ECGClinicSubscriptionModelService
{
    /**
     * Get a paginated list of clinic subscriptions.
     *
     * @param int $perPage
     * @return array
     */
    public function getSubscriptions(int $perPage): array
    {
        // Fetch paginated data from the ECGClinicSubscriptionModel model
        $data = ECGClinicSubscriptionModel::paginate($perPage);

        return [
            'subscriptions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * create a clinic subscription.
     *
     * @param array $data The validated data for creating the event
     * @return ECGClinicSubscriptionModel The newly created event model
     */
    public function createSubscription(array $data): ECGClinicSubscriptionModel
    {
        return ECGClinicSubscriptionModel::create($data);
    }

    /**
     * update a clinic subscription.
     *
     * @param ECGClinicSubscriptionModel $ecgActivityEvent The event model to update
     * @param array $data The validated data for updating the event
     * @return ECGClinicSubscriptionModel The updated event model
     */
    public function updateSubscription(ECGClinicSubscriptionModel $request, array $data): ECGClinicSubscriptionModel
    {
        $request->update($data);
        $request->fresh($data);

        return $request;
    }
}
