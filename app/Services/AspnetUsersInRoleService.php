<?php

namespace App\Services;

use App\Http\Resources\AspnetUsersInRoleResource; // Assuming you have a resource for this model
use App\Models\AspnetUsersInRole;

class AspnetUsersInRoleService
{
    public function getAspnetUsersInRole($perPage = 50)
    {
        $usersInRole = AspnetUsersInRole::paginate($perPage);

        return [
            'usersInRole' => $usersInRole, // Assuming you have a resource
            'pagination' => [
                'currentPage' => $usersInRole->currentPage(),
                'perPage' => $usersInRole->perPage(),
                'total' => $usersInRole->total(),
            ]
        ];
    }

    /**
     * Create a new users in role record.
     *
     * @param array $data The validated data for creating the users in role
     * @return AspnetUsersInRole The newly created users in role model
     */
    public function createUsersInRole(array $data): AspnetUsersInRole
    {
        return AspnetUsersInRole::create($data);
    }

    /**
     * Update an existing users in role record.
     *
     * @param AspnetUsersInRole $aspnetUsersInRole The users in role model to update
     * @param array $data The validated data for updating the users in role
     * @return AspnetUsersInRole The updated users in role model
     */
    public function updateUsersInRole(AspnetUsersInRole $aspnetUsersInRole, array $data): AspnetUsersInRole
    {
        $aspnetUsersInRole->update($data);
        $aspnetUsersInRole->fresh();
        return $aspnetUsersInRole;
    }
}