<?php

namespace App\Services;

use App\Models\ActivityInOutHeader;

class ActivityInOutHeaderService
{
    /**
     * Get paginated activity in/out headers.
     *
     * @param int $perPage Number of items per page
     * @return array The activity in/out details and pagination data
     */
    public function getActivityInOutHeaders(int $perPage): array
    {
        $details = ActivityInOutHeader::paginate($perPage);
        
        return [
            'activity_in_out_header' => $details,
            'pagination' => [
                'current_page' => $details->currentPage(),
                'total_pages' => $details->lastPage(),
                'total' => $details->total(),
            ]
        ];
    }

    /**
     * Create a new activity in/out header record.
     *
     * @param array $data The validated data for creating the activity in/out header
     * @return ActivityInOutHeader The newly created activity in/out header model
     */
    public function createActivityInOutHeader(array $data): ActivityInOutHeader
    {
        return ActivityInOutHeader::create($data);
    }

    /**
     * Update an existing activity in/out header record.
     *
     * @param ActivityInOutHeader $activityInOutHeader The activity in/out header model to update
     * @param array $data The validated data for updating the activity in/out header
     * @return ActivityInOutHeader The updated activity in/out header model
     */
    public function updateActivityInOutHeader(ActivityInOutHeader $activityInOutHeader, array $data): ActivityInOutHeader
    {
        $activityInOutHeader->update($data);
        $activityInOutHeader->fresh();
        return $activityInOutHeader;
    }
}
