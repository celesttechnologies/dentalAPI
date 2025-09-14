<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\JobService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\JobResource;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    use ApiResponse;

    public function __construct(private JobService $jobService)
    {
    }

    /**
     * @group Job
     *
     * @method GET
     *
     * List all job
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "jobs": [
     *                 {
     *                     "id": 1,
     *                     "queue": "Example value",
     *                     "payload": "Example value",
     *                     "attempts": "Example value",
     *                     "reserved_at": "Example value",
     *                     "available_at": "Example value",
     *                     "created_at": "2025-05-19 04:57:26"
     *                 }
     *             ],
     *             "pagination": {
     *                 "current_page": 1,
     *                 "per_pages": 50,
     *                 "total": 100
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', env('DEFAULT_PER_PAGE', 50));
            $data = $this->jobService->getJobs($perPage);

            return $this->successResponse([
                'jobs' => JobResource::collection($data['jobs']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Jobs: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group Job
     *
     * @method GET
     *
     * Create job
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "job": {
     *                 "id": 1,
     *                 "queue": "Example value",
     *                 "payload": "Example value",
     *                 "attempts": "Example value",
     *                 "reserved_at": "Example value",
     *                 "available_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobResource
     */
    public function create()
    {
        //
    }

    /**
     * @group Job
     *
     * @method POST
     *
     * Create a new job
     *
     * @post /
     *
     * @bodyParam id number required. integer. Example: 1
     * @bodyParam queue string required. Maximum length: 255. Example: "Example Queue"
     * @bodyParam payload string required. Example: "Example Payload"
     * @bodyParam attempts number required. integer. Example: 1
     * @bodyParam reserved_at number optional. nullable. integer. Example: 1
     * @bodyParam available_at number required. integer. Example: 1
     * @bodyParam created_at number required. integer. Example: 1
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "job": {
     *                 "id": 1,
     *                 "queue": "Example value",
     *                 "payload": "Example value",
     *                 "attempts": "Example value",
     *                 "reserved_at": "Example value",
     *                 "available_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobResource
     */
    public function store(StoreJobRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $job = $this->jobService->createJob($validatedData);

            return $this->successResponse([
                'message' => 'Job created successfully',
                'job' => new JobResource($job)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating job: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create job',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Job
     *
     * @method GET
     *
     * Get a specific job
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the job to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "job": {
     *                 "id": 1,
     *                 "queue": "Example value",
     *                 "payload": "Example value",
     *                 "attempts": "Example value",
     *                 "reserved_at": "Example value",
     *                 "available_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobResource
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * @group Job
     *
     * @method GET
     *
     * Edit job
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the job to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "job": {
     *                 "id": 1,
     *                 "queue": "Example value",
     *                 "payload": "Example value",
     *                 "attempts": "Example value",
     *                 "reserved_at": "Example value",
     *                 "available_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobResource
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * @group Job
     *
     * @method PUT
     *
     * Update an existing job
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the job to update. Example: 1
     *
     * @bodyParam id number optional. integer. Example: 1
     * @bodyParam queue string optional. Maximum length: 255. Example: "Example Queue"
     * @bodyParam payload string optional. Example: "Example Payload"
     * @bodyParam attempts number optional. integer. Example: 1
     * @bodyParam reserved_at number optional. nullable. integer. Example: 1
     * @bodyParam available_at number optional. integer. Example: 1
     * @bodyParam created_at number optional. integer. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "job": {
     *                 "id": 1,
     *                 "queue": "Example value",
     *                 "payload": "Example value",
     *                 "attempts": "Example value",
     *                 "reserved_at": "Example value",
     *                 "available_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobResource
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        try {
            $validatedData = $request->validated();

            $updatedJob = $this->jobService->updateJob($job, $validatedData);

            return $this->successResponse([
                'message' => 'Job updated successfully',
                'job' => new JobResource($updatedJob)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating job: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update job',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Job
     *
     * @method DELETE
     *
     * Delete a job
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the job to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
