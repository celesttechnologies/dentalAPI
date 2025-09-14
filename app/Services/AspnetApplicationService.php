<?php

namespace App\Services;
use App\Models\AspnetApplication;
use App\Http\Resources\AspnetApplicationResource;

class AspnetApplicationService
{
    // Add your business logic for AspnetApplication here.
    public function getAspnetApplication($perPage)
    {
        // Fetch paginated data from the AspnetApplication model
        $applications = AspnetApplication::paginate($perPage);

        return [
            'application'=>$applications,
            'pagination' => [
                'currentPage' => $applications->currentPage(),
                'perPage' => $applications->perPage(),
                'total' => $applications->total(),
            ]
        ];
    }

    /**
     * Create a new application record.
     *
     * @param array $data The validated data for creating the application
     * @return AspnetApplication The newly created application model
     */
    public function createApplication(array $data): AspnetApplication
    {
        return AspnetApplication::create($data);
    }

    /**
     * Update an existing application record.
     *
     * @param AspnetApplication $aspnetApplication The application model to update
     * @param array $data The validated data for updating the application
     * @return AspnetApplication The updated application model
     */
    public function updateApplication(AspnetApplication $aspnetApplication, array $data): AspnetApplication
    {
        $aspnetApplication->update($data);
        $aspnetApplication->fresh();
        return $aspnetApplication;
    }
}

