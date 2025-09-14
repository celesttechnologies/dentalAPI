<?php

namespace App\Services;

use App\Models\UsersOriginal;

class UsersOriginalService
{
    public function getUsersOriginal(int $perPage = 50): array
    {
        $data = UsersOriginal::where('IsDeleted', 0)->paginate($perPage);

        return [
            'users_original' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
}
