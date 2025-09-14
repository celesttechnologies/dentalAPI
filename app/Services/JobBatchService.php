<?php

namespace App\Services;

use App\Models\JobBatch;
use App\Http\Resources\JobBatchResource;

class JobBatchService
{
    /**
     * Get a paginated list of Job Batches.
     *
     * @param int $perPage
     * @return array
     */
    public function getJobBatches(int $perPage): array
    {
        $data = JobBatch::paginate($perPage);

        return [
            'batches' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createBatch(array $data): JobBatch
    {
        return JobBatch::create($data);
    }

    public function updateBatch(JobBatch $jobBatch, array $data): JobBatch
    {
        $jobBatch->update($data);
        $jobBatch->fresh();

        return $jobBatch;
    }
}