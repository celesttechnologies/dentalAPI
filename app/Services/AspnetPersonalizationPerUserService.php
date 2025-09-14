<?php

namespace App\Services;

use App\Models\AspnetPersonalizationPerUser;

class AspnetPersonalizationPerUserService
{
    // Add your business logic for AspnetPersonalizationPerUser here.
    public function getAspnetPersonalizationPerUser($perPage = 50)
    {
        $aspnetPersonalization = AspnetPersonalizationPerUser::paginate($perPage);

        return [
            // Match the key expected in the controller
            'aspnetProfile' => $aspnetPersonalization,
            'pagination' => [
                'currentPage' => $aspnetPersonalization->currentPage(),
                'perPage' => $aspnetPersonalization->perPage(),
                'total' => $aspnetPersonalization->total(),
            ]
        ];
    }

    /**
     * Create a new personalization per user record.
     *
     * @param array $data The validated data for creating the personalization per user
     * @return AspnetPersonalizationPerUser The newly created personalization per user model
     */
    public function createPersonalizationPerUser(array $data): AspnetPersonalizationPerUser
    {
        return AspnetPersonalizationPerUser::create($data);
    }

    /**
     * Update an existing personalization per user record.
     *
     * @param AspnetPersonalizationPerUser $aspnetPersonalizationPerUser The personalization per user model to update
     * @param array $data The validated data for updating the personalization per user
     * @return AspnetPersonalizationPerUser The updated personalization per user model
     */
    public function updatePersonalizationPerUser(AspnetPersonalizationPerUser $aspnetPersonalizationPerUser, array $data): AspnetPersonalizationPerUser
    {
        $aspnetPersonalizationPerUser->update($data);
        $aspnetPersonalizationPerUser->fresh();
        return $aspnetPersonalizationPerUser;
    }
}
