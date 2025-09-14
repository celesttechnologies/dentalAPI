<?php

namespace App\Services;

use App\Http\Resources\AspnetMembershipResource;
use App\Models\AspnetMembership;

class AspnetMembershipService
{
    // Add your business logic for AspnetMembership here.
    public function getAspnetMembershipList($perPage = 10)
    {
        $memberships = AspnetMembership::paginate($perPage);

        return [
            'aspnetMembership' => $memberships,
            'pagination' => [
                'total'         => $memberships->total(),
                'perPage'      => $memberships->perPage(),
                'total'  => $memberships->currentPage(), // Using the paginator's method correctly
           
            ]
        ];
    }

    /**
     * Create a new membership record.
     *
     * @param array $data The validated data for creating the membership
     * @return AspnetMembership The newly created membership model
     */
    public function createMembership(array $data): AspnetMembership
    {
        return AspnetMembership::create($data);
    }

    /**
     * Update an existing membership record.
     *
     * @param AspnetMembership $aspnetMembership The membership model to update
     * @param array $data The validated data for updating the membership
     * @return AspnetMembership The updated membership model
     */
    public function updateMembership(AspnetMembership $aspnetMembership, array $data): AspnetMembership
    {
        $aspnetMembership->update($data);
        $aspnetMembership->fresh();
        return $aspnetMembership;
    }
}
