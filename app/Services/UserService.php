<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    // Add your business logic for User here.
    public function getUsers($perPage = 50)
    {
        $userList = User::paginate($perPage);
        return [
            'users' => $userList,
            'pagination' => [
                'currentPage' => $userList->currentPage(),
                'perPage' => $userList->perPage(),
                'total' => $userList->total(),
            ]
        ];
    }

    /**
     * Create a new user record.
     *
     * @param array $data The validated data for creating the user
     * @return User The newly created user model
     */
    public function createUser(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update an existing user record.
     *
     * @param User $user The user model to update
     * @param array $data The validated data for updating the user
     * @return User The updated user model
     */
    public function updateUser(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }
}
