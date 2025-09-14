<?php

namespace App\Services;

use App\Models\Job;
use App\Http\Resources\JobResource;

class JobService
{
    /**
     * Get a paginated list of Jobs.
     *
     * @param int $perPage
     * @return array
     */
    public function getJobs(int $perPage): array
    {
        $data = Job::paginate($perPage);

        return [
            'jobs' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }
    
    public function createJob(array $data): Job
    {
        return Job::create($data);
    }

    public function updateJob(Job $job, array $data): Job
    {
        $job->update($data);
        $job->fresh();

        return $job;
    }
}