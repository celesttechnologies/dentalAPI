<?php

namespace App\Services;

use App\Models\OtherCommunicationGroup;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\OtherCommunicationGroupResource;

class OtherCommunicationGroupService
{
    /**
     * Get a paginated list of Other Communication Groups.
     *
     * @param int $perPage
     * @return array
     */
    public function getOtherCommunicationGroups(int $perPage): array
    {
        $data = OtherCommunicationGroup::paginate($perPage);

        return [
            'groups' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new communication group record.
     *
     * @param array $data The validated data for creating the communication group
     * @return OtherCommunicationGroup The newly created communication group model
     */
    public function createGroup(array $data): OtherCommunicationGroup
    {
        return OtherCommunicationGroup::create($data);
    }

    /**
     * Update an existing communication group record.
     *
     * @param OtherCommunicationGroup $otherCommunicationGroup The communication group model to update
     * @param array $data The validated data for updating the communication group
     * @return OtherCommunicationGroup The updated communication group model
     */
    public function updateGroup(OtherCommunicationGroup $otherCommunicationGroup, array $data): OtherCommunicationGroup
    {
        $otherCommunicationGroup->update($data);
        return $otherCommunicationGroup;
    }
}