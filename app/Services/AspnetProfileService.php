<?php

namespace App\Services;

use App\Models\AspnetProfile;

class AspnetProfileService
{
    // Add your business logic for AspnetProfile here.
    public function getAspnetProfile($perPage = 50)
    {
        $aspnetPersonalization = AspnetProfile::paginate($perPage);

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
     * Create a new profile record.
     *
     * @param array $data The validated data for creating the profile
     * @return AspnetProfile The newly created profile model
     */
    public function createProfile(array $data): AspnetProfile
    {
        return AspnetProfile::create($data);
    }

    /**
     * Update an existing profile record.
     *
     * @param AspnetProfile $aspnetProfile The profile model to update
     * @param array $data The validated data for updating the profile
     * @return AspnetProfile The updated profile model
     */
    public function updateProfile(AspnetProfile $aspnetProfile, array $data): AspnetProfile
    {
        $aspnetProfile->update($data);
        $aspnetProfile->fresh();

        return $aspnetProfile;
    }
}
