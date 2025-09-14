<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobBatchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'name' => 'sometimes|string',
			'total_jobs' => 'sometimes|string',
			'pending_jobs' => 'sometimes|string',
			'failed_jobs' => 'sometimes|string',
			'failed_job_ids' => 'sometimes|string|max:255',
			'options' => 'sometimes|string',
			'cancelled_at' => 'sometimes|string',
			'finished_at' => 'sometimes|string',
        ];
    }
}