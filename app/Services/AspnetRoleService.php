<?php

namespace App\Services;

use App\Models\AspnetRole;

class AspnetRoleService
{
    // Add your business logic for AspnetRole here.
    public function getAspnetRoleService($perPage = 50)
    {
        $aspnetRoleList = AspnetRole::paginate($perPage);

        return [
            'aspnetRoles' => $aspnetRoleList,
            'pagination' => [
                'currentPage' => $aspnetRoleList->currentPage(),
                'perPage' => $aspnetRoleList->perPage(),
                'total' => $aspnetRoleList->total(),
            ]
        ];
    }

    /**
     * Create a new role record.
     *
     * @param array $data The validated data for creating the role
     * @return AspnetRole The newly created role model
     */
    public function createRole(array $data): AspnetRole
    {
        return AspnetRole::create($data);
    }

    /**
     * Update an existing role record.
     *
     * @param AspnetRole $aspnetRole The role model to update
     * @param array $data The validated data for updating the role
     * @return AspnetRole The updated role model
     */
    public function updateRole(AspnetRole $aspnetRole, array $data): AspnetRole
    {
        $aspnetRole->update($data);
        return $aspnetRole;
    }
}

