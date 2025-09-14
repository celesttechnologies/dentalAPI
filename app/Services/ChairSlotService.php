<?php

namespace App\Services;

use App\Http\Resources\ChairSlotResource; // Assuming you have a resource for this model
use App\Models\ChairSlot;

class ChairSlotService
{
    public function getChairSlots($perPage = 50)
    {
        // Fetch chair slots with pagination
        $chairSlots = ChairSlot::paginate($perPage);

        return [
            'chairSlots' => $chairSlots, // Format the response using the resource
            'pagination' => [
                'currentPage' => $chairSlots->currentPage(),
                'perPage' => $chairSlots->perPage(),
                'total' => $chairSlots->total(),
            ]
        ];
    }

    /**
     * Create a new chair slot record.
     *
     * @param array $data The validated data for creating the chair slot
     * @return ChairSlot The newly created chair slot model
     */
    public function createChairSlot(array $data): ChairSlot
    {
        return ChairSlot::create($data);
    }

    /**
     * Update an existing chair slot record.
     *
     * @param ChairSlot $chairSlot The chair slot model to update
     * @param array $data The validated data for updating the chair slot
     * @return ChairSlot The updated chair slot model
     */
    public function updateChairSlot(ChairSlot $chairSlot, array $data): ChairSlot
    {
        $chairSlot->update($data);
        return $chairSlot;
    }
}
