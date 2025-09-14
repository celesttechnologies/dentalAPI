<?php

namespace App\Services;

use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProviderService
{
    // Add your business logic for Provider here.
    public function getProviders($perPage = 50, $search = null)
    {
        $providerList = Provider::when($search, function (Builder $query) use ($search) {
            $query->where('Name', 'like', "%$search%")
                  ->orWhere('Email', 'like', "%$search%")
                  ->orWhere('PhoneNumber', 'like', "%$search%");
        })->paginate($perPage);
        return [
            'providers' => $providerList,
            'pagination' => [
                'currentPage' => $providerList->currentPage(),
                'perPage' => $providerList->perPage(),
                'total' => $providerList->total(),
            ]
        ];
    }

    /**
     * Create a new provider record.
     *
     * @param array $data The validated data for creating the provider
     * @return Provider The newly created provider model
     */
    public function createProvider(array $data): Provider
    {
        return Provider::create($data);
    }

    /**
     * Update an existing provider record.
     *
     * @param Provider $provider The provider model to update
     * @param array $data The validated data for updating the provider
     * @return Provider The updated provider model
     */
    public function updateProvider(Provider $provider, array $data): Provider
    {
        $provider->update($data);
        return $provider;
    }
}
