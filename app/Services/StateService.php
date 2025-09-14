<?php

namespace App\Services;

use App\Http\Resources\StateResource;
use App\Models\State;

class StateService
{
    // Add your business logic for State here.
    public function getStates($perPage = 50)
    {
        $stateList = State::paginate($perPage);
        return [
            'states' => $stateList,
            'pagination' => [
                'currentPage' => $stateList->currentPage(),
                'perPage' => $stateList->perPage(),
                'total' => $stateList->total(),
            ]
        ];
    }

    public function createState(array $data): State
    {
        return State::create($data);
    }

    public function updateState(State $state, array $data): State
    {
        $state->update($data);
        $state->fresh();

        return $state;
    }
}
