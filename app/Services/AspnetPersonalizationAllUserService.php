<?php

namespace App\Services;

use App\Models\AspnetPersonalizationAllUser;

class AspnetPersonalizationAllUserService
{
    // Add your business logic for AspnetPersonalizationAllUser here.
    public function getAspnetPersonalizationAllUser($perPage = 50)
    {
        $aspnetPersonalization = AspnetPersonalizationAllUser::paginate($perPage);

        return [
            // Match the key expected in the controller
            'AspnetPersonalizationAllUsers' => $aspnetPersonalization,
            'pagination' => [
                'currentPage' => $aspnetPersonalization->currentPage(),
                'perPage' =>  $aspnetPersonalization->perPage(),
                'total' => $aspnetPersonalization->total(),
            ]
        ];
    }

    /**
     * Create a new personalization all user record.
     *
     * @param array $data The validated data for creating the personalization all user
     * @return AspnetPersonalizationAllUser The newly created personalization all user model
     */
    public function createPersonalizationAllUser(array $data): AspnetPersonalizationAllUser
    {
        return AspnetPersonalizationAllUser::create($data);
    }

    /**
     * Update an existing personalization all user record.
     *
     * @param AspnetPersonalizationAllUser $aspnetPersonalizationAllUser The personalization all user model to update
     * @param array $data The validated data for updating the personalization all user
     * @return AspnetPersonalizationAllUser The updated personalization all user model
     */
    public function updatePersonalizationAllUser(AspnetPersonalizationAllUser $aspnetPersonalizationAllUser, array $data): AspnetPersonalizationAllUser
    {
        $aspnetPersonalizationAllUser->update($data);
        $aspnetPersonalizationAllUser->fresh();

        return $aspnetPersonalizationAllUser;
    }
}
