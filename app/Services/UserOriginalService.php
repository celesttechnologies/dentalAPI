<?php

namespace App\Services;

use App\Models\UserOriginal;
use App\Http\Resources\UserOriginalResource;

class UserOriginalService
{
    public function getUserOriginals(int $perPage = 50): array
    {
        $data = UserOriginal::paginate($perPage);

        return [
            'user_originals' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
}


