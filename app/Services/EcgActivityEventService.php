<?php

namespace App\Services;

use App\Models\EcgActivityEvent;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\EcgActivityEventResource;

class EcgActivityEventService
{
    /**
     * Get a paginated list of ECG activity events.
     *
     * @param int $perPage
     * @return array
     */
    public function getEvents(int $perPage): array
    {
        // Fetch paginated data from the EcgActivityEvent model
        $data = EcgActivityEvent::paginate($perPage);

        return [
            'events' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(), // Current page number
                'per_page' => $data->perPage(),         // Number of items per page
                'total' => $data->total(),               // Total number of items
            ]
        ];
    }

    /**
     * Create a new event record.
     *
     * @param array $data The validated data for creating the event
     * @return EcgActivityEvent The newly created event model
     */
    public function createEvent(array $data): EcgActivityEvent
    {
        return EcgActivityEvent::create($data);
    }

    /**
     * Update an existing event record.
     *
     * @param EcgActivityEvent $ecgActivityEvent The event model to update
     * @param array $data The validated data for updating the event
     * @return EcgActivityEvent The updated event model
     */
    public function updateEvent(EcgActivityEvent $ecgActivityEvent, array $data): EcgActivityEvent
    {
        $ecgActivityEvent->update($data);
        $ecgActivityEvent->fresh();
        return $ecgActivityEvent;
    }
}