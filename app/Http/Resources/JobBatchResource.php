<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobBatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, // Maps to 'id'
            'name' => $this->name, // Maps to 'name'
            'total_jobs' => $this->total_jobs, // Maps to 'total_jobs'
            'pending_jobs' => $this->pending_jobs, // Maps to 'pending_jobs'
            'failed_jobs' => $this->failed_jobs, // Maps to 'failed_jobs'
            'failed_job_ids' => $this->failed_job_ids, // Maps to 'failed_job_ids'
            'options' => $this->options, // Maps to 'options'
            'cancelled_at' => $this->cancelled_at, // Maps to 'cancelled_at'
            'created_at' => $this->created_at, // Maps to 'created_at'
            'finished_at' => $this->finished_at, // Maps to 'finished_at'
        ];
    }
}