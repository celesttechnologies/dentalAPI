<?php

namespace App\Http\Controllers;

use App\Models\JobBatch;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Exception;
use App\Services\JobBatchService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\JobBatchResource;
use App\Http\Requests\StoreJobBatchRequest;
use App\Http\Requests\UpdateJobBatchRequest;

class JobBatchController extends Controller
{
    use ApiResponse;

    public function __construct(private JobBatchService $batchService)
    {
    }

    /**
     * @group JobBatch
     *
     * @method GET
     *
     * List all jobbatch
     *
     * @get /
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "job_batches": [
     *                 {
     *                     "id": 1,
     *                     "name": "Example Name",
     *                     "total_jobs": "Example value",
     *                     "pending_jobs": "Example value",
     *                     "failed_jobs": "Example value",
     *                     "failed_job_ids": 1,
     *                     "options": "Example value",
     *                     "cancelled_at": "Example value",
     *                     "created_at": "2025-05-19 04:57:26",
     *                     "finished_at": "Example value"
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
            $data = $this->batchService->getJobBatches($perPage);

            return $this->successResponse([
                'job_batches' => JobBatchResource::collection($data['batches']),
                'pagination' => $data['pagination']
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching Job Batches: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }

    /**
     * @group JobBatch
     *
     * @method GET
     *
     * Create jobbatch
     *
     * @get /create
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "batch": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "total_jobs": "Example value",
     *                 "pending_jobs": "Example value",
     *                 "failed_jobs": "Example value",
     *                 "failed_job_ids": 1,
     *                 "options": "Example value",
     *                 "cancelled_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "finished_at": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobBatchResource
     */
    public function create()
    {
        //
    }

    /**
     * @group JobBatch
     *
     * @method POST
     *
     * Create a new jobbatch
     *
     * @post /
     *
     * @bodyParam name string required. Example: "John Doe"
     * @bodyParam total_jobs string required. Example: "Example Total jobs"
     * @bodyParam pending_jobs string required. Example: "Example Pending jobs"
     * @bodyParam failed_jobs string required. Example: "Example Failed jobs"
     * @bodyParam failed_job_ids string required. Maximum length: 255. Example: "1"
     * @bodyParam options string required. Example: "Example Options"
     * @bodyParam cancelled_at string required. Example: "Example Cancelled at"
     * @bodyParam finished_at string required. Example: "Example Finished at"
     *
     * @response 201 scenario="Success" {
     *     {
     *         "data": {
     *             "batch": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "total_jobs": "Example value",
     *                 "pending_jobs": "Example value",
     *                 "failed_jobs": "Example value",
     *                 "failed_job_ids": 1,
     *                 "options": "Example value",
     *                 "cancelled_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "finished_at": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobBatchResource
     */
    public function store(StoreJobBatchRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $batch = $this->batchService->createBatch($validatedData);

            return $this->successResponse([
                'message' => 'Job batch created successfully',
                'batch' => new JobBatchResource($batch)
            ], 201);
        } catch (Exception $e) {
            Log::error('Error creating job batch: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to create job batch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group JobBatch
     *
     * @method GET
     *
     * Get a specific jobbatch
     *
     * @get /{id}
     *
     * @urlParam id integer required. The ID of the jobbatch to retrieve. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "batch": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "total_jobs": "Example value",
     *                 "pending_jobs": "Example value",
     *                 "failed_jobs": "Example value",
     *                 "failed_job_ids": 1,
     *                 "options": "Example value",
     *                 "cancelled_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "finished_at": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobBatchResource
     */
    public function show(JobBatch $jobBatch)
    {
        //
    }

    /**
     * @group JobBatch
     *
     * @method GET
     *
     * Edit jobbatch
     *
     * @get /{id}/edit
     *
     * @urlParam id integer required. The ID of the jobbatch to use. Example: 1
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "batch": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "total_jobs": "Example value",
     *                 "pending_jobs": "Example value",
     *                 "failed_jobs": "Example value",
     *                 "failed_job_ids": 1,
     *                 "options": "Example value",
     *                 "cancelled_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "finished_at": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobBatchResource
     */
    public function edit(JobBatch $jobBatch)
    {
        //
    }

    /**
     * @group JobBatch
     *
     * @method PUT
     *
     * Update an existing jobbatch
     *
     * @put /{id}
     *
     * @urlParam id integer required. The ID of the jobbatch to update. Example: 1
     *
     * @bodyParam name string optional. Example: "John Doe"
     * @bodyParam total_jobs string optional. Example: "Example Total jobs"
     * @bodyParam pending_jobs string optional. Example: "Example Pending jobs"
     * @bodyParam failed_jobs string optional. Example: "Example Failed jobs"
     * @bodyParam failed_job_ids string optional. Maximum length: 255. Example: "1"
     * @bodyParam options string optional. Example: "Example Options"
     * @bodyParam cancelled_at string optional. Example: "Example Cancelled at"
     * @bodyParam finished_at string optional. Example: "Example Finished at"
     *
     * @response 200 scenario="Success" {
     *     {
     *         "data": {
     *             "batch": {
     *                 "id": 1,
     *                 "name": "Example Name",
     *                 "total_jobs": "Example value",
     *                 "pending_jobs": "Example value",
     *                 "failed_jobs": "Example value",
     *                 "failed_job_ids": 1,
     *                 "options": "Example value",
     *                 "cancelled_at": "Example value",
     *                 "created_at": "2025-05-19 04:57:26",
     *                 "finished_at": "Example value"
     *             }
     *         }
     *     }
     * }
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return JobBatchResource
     */
    public function update(UpdateJobBatchRequest $request, JobBatch $jobBatch)
    {
        try {
            $validatedData = $request->validated();

            $updatedBatch = $this->batchService->updateBatch($jobBatch, $validatedData);

            return $this->successResponse([
                'message' => 'Job batch updated successfully',
                'batch' => new JobBatchResource($updatedBatch)
            ]);
        } catch (Exception $e) {
            Log::error('Error updating job batch: ' . $e->getMessage());

            return $this->errorResponse([
                'message' => 'Failed to update job batch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group JobBatch
     *
     * @method DELETE
     *
     * Delete a jobbatch
     *
     * @delete /{id}
     *
     * @urlParam id integer required. The ID of the jobbatch to delete. Example: 1
     *
     * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
     * @response 404 {"message": "Resource not found"}
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobBatch $jobBatch)
    {
        //
    }
}
