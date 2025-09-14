<?php

namespace App\Services;

use App\Http\Resources\AspnetWebEventResource; // Assuming you have a resource for this model
use App\Models\AspnetWebEventEvent;

class AspnetWebEventService
{
    public function getAspnetWebEvents($perPage = 50)
    {
        $webEvents = AspnetWebEventEvent::paginate($perPage);

        return [
            'webEvents' => $webEvents, // Assuming you have a resource
            'pagination' => [
                'currentPage' => $webEvents->currentPage(),
                'perPage' => $webEvents->perPage(),
                'total' => $webEvents->total(),
            ]
        ];
    }

    /**
     * Create a new web event event record.
     *
     * @param array $data The validated data for creating the web event event
     * @return AspnetWebEventEvent The newly created web event event model
     */
    public function createWebEventEvent(array $data): AspnetWebEventEvent
    {
        return AspnetWebEventEvent::create($data);
    }

    /**
     * Update an existing web event event record.
     *
     * @param AspnetWebEventEvent $aspnetWebEventEvent The web event event model to update
     * @param array $data The validated data for updating the web event event
     * @return AspnetWebEventEvent The updated web event event model
     */
    public function updateWebEventEvent(AspnetWebEventEvent $aspnetWebEventEvent, array $data): AspnetWebEventEvent
    {
        $aspnetWebEventEvent->update($data);
        $aspnetWebEventEvent->fresh();
        return $aspnetWebEventEvent;
    }
}