<?php

namespace App\Services;

use App\Models\UsersClinicInfo;
use App\Http\Resources\UsersClinicInfoResource;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersClinicInfoService
{
    /**
     * Get a paginated list of Users Clinic Info.
     *
     * @param int $perPage
     * @return array
     */
    public function getUsersClinicInfo(int $perPage = 50): array
    {
        $data = UsersClinicInfo::where('IsDeleted', 0)->paginate($perPage);

        return [
            'users_clinic_info' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new users clinic info record.
     *
     * @param array $data The validated data for creating the users clinic info
     * @return UsersClinicInfo The newly created users clinic info model
     */
    public function createUsersClinicInfo(array $data): UsersClinicInfo
    {
        return UsersClinicInfo::create($data);
    }

    /**
     * Update an existing users clinic info record.
     *
     * @param UsersClinicInfo $usersClinicInfo The users clinic info model to update
     * @param array $data The validated data for updating the users clinic info
     * @return UsersClinicInfo The updated users clinic info model
     */
    public function updateUsersClinicInfo(UsersClinicInfo $usersClinicInfo, array $data): UsersClinicInfo
    {
        $usersClinicInfo->update($data);
        return $usersClinicInfo;
    }
}
