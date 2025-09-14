<?php

namespace App\Services;
use App\Models\AspnetPath;
use App\Http\Resources\AspnetPathResource;

class AspnetPathService
{
    // Add your business logic for AspnetPath here.

    public function getaspnetPathService($perPage = 50)
    {
        $aspnetPathServiceList = AspnetPath::paginate($perPage);
        return [
            'aspnetPathService' => $aspnetPathServiceList,
            'pagination' => [
                'currentPage' =>  $aspnetPathServiceList->currentPage(),
                'perPage' => $aspnetPathServiceList->perPage(),
                'total' =>  $aspnetPathServiceList->total(),
            ]
        ];
    }

    /**
     * Create a new path record.
     *
     * @param array $data The validated data for creating the path
     * @return AspnetPath The newly created path model
     */
    public function createPath(array $data): AspnetPath
    {
        return AspnetPath::create($data);
    }

    /**
     * Update an existing path record.
     *
     * @param AspnetPath $aspnetPath The path model to update
     * @param array $data The validated data for updating the path
     * @return AspnetPath The updated path model
     */
    public function updatePath(AspnetPath $aspnetPath, array $data): AspnetPath
    {
        $aspnetPath->update($data);
        $aspnetPath->fresh();

        return $aspnetPath;
    }
}
