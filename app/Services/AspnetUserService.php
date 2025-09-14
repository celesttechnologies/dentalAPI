<?php

namespace App\Services;

use App\Models\AspnetUser;

class AspnetUserService
{
    public function getAspnetUsers($perPage = 50)
    {
        $users = AspnetUser::paginate($perPage);

        return [
            'users' => $users, // Assuming you have a resource
            'pagination' => [
                'currentPage' => $users->currentPage(),
                'perPage' => $users->perPage(),
                'total' => $users->total(),
            ]
        ];
    }

    /**
     * Create a new aspnet user record.
     *
     * @param array $data The validated data for creating the aspnet user
     * @return AspnetUser The newly created aspnet user model
     */
    public function createUser(array $data): AspnetUser
    {
        return AspnetUser::create($data);
    }

    /**
     * Update an existing aspnet user record.
     *
     * @param AspnetUser $aspnetUser The aspnet user model to update
     * @param array $data The validated data for updating the aspnet user
     * @return AspnetUser The updated aspnet user model
     */
    public function updateUser(AspnetUser $aspnetUser, array $data): AspnetUser
    {
        $aspnetUser->update($data);
        $aspnetUser->fresh();
        return $aspnetUser;
    }
}