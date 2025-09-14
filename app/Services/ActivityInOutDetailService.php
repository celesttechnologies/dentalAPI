<?php

namespace App\Services;

use App\Models\ActivityInOutDetail;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivityInOutDetailService
{
    /**
     * Get paginated activity in/out details.
     *
     * @param int $perPage Number of items per page
     * @return array The activity in/out details and pagination data
     */
    public function getActivityInOutDetails(int $perPage): array
    {
        $details = ActivityInOutDetail::paginate($perPage);
        
        return [
            'activity_in_out_details' => $details,
            'pagination' => [
                'current_page' => $details->currentPage(),
                'total_pages' => $details->lastPage(),
                'total' => $details->total(),
            ]
        ];
    }

    /**
     * Create a new activity in/out detail record.
     *
     * @param array $data The validated data for creating the activity in/out detail
     * @return ActivityInOutDetail The newly created activity in/out detail model
     */
    public function createActivityInOutDetail(array $data): ActivityInOutDetail
    {
        return ActivityInOutDetail::create($data);
    }

    /**
     * Update an existing activity in/out detail record.
     *
     * @param ActivityInOutDetail $activityInOutDetail The activity in/out detail model to update
     * @param array $data The validated data for updating the activity in/out detail
     * @return ActivityInOutDetail The updated activity in/out detail model
     */
    public function updateActivityInOutDetail(ActivityInOutDetail $activityInOutDetail, array $data): ActivityInOutDetail
    {
        $activityInOutDetail->update($data);
        $activityInOutDetail->fresh();

        return $activityInOutDetail;
    }
}
