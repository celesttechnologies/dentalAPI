<?php

namespace App\Services;

use App\Models\Session;
use App\Http\Resources\SessionResource;
use Illuminate\Pagination\LengthAwarePaginator;

class SessionService
{
    /**
     * Get a paginated list of Sessions.
     *
     * @param int $perPage
     * @return array
     */
    public function getSessions(int $perPage): array
    {
        $data = Session::paginate($perPage);

        return [
            'sessions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new session record.
     *
     * @param array $data The validated data for creating the session
     * @return Session The newly created session model
     */
    public function createSession(array $data): Session
    {
        return Session::create($data);
    }

    /**
     * Update an existing session record.
     *
     * @param Session $session The session model to update
     * @param array $data The validated data for updating the session
     * @return Session The updated session model
     */
    public function updateSession(Session $session, array $data): Session
    {
        $session->update($data);
        return $session;
    }
}
