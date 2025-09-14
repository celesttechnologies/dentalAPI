<?php

namespace App\Services;

use App\Models\ECGMSubscriptionModel;
use App\Http\Resources\ECGMSubscriptionModelResource;

class ECGMSubscriptionModelService
{
    /**
     * Get a paginated list of ECGM subscriptions.
     *
     * @param int $perPage
     * @return array
     */
    public function getSubscriptions(int $perPage): array
    {
        // Fetch paginated data from the ECGMSubscriptionModel model
        $data = ECGMSubscriptionModel::paginate($perPage);

        return [
            'subscriptions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    public function createSubscription(array $data): ECGMSubscriptionModel
    {
        return ECGMSubscriptionModel::create($data);
    }

    public function updateSubscription(ECGMSubscriptionModel $subscriptionModel, array $data): ECGMSubscriptionModel
    {
        $subscriptionModel->update($data);
        $subscriptionModel->fresh();
        return $subscriptionModel;
    }
}