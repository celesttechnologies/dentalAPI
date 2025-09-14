<?php

namespace App\Services;

use App\Http\Resources\CountryResource;
use App\Models\Country;

class CountryService
{
    // Add your business logic for Country here.
    public function getCountries($perPage = 50)
    {
        $countryList = Country::paginate($perPage);
        return [
            'countries' => $countryList,
            'pagination' => [
                'currentPage' => $countryList->currentPage(),
                'perPage' => $countryList->perPage(),
                'total' => $countryList->total(),
            ]
        ];
    }

    /**
     * Create a new country record.
     *
     * @param array $data The validated data for creating the country
     * @return Country The newly created country model
     */
    public function createCountry(array $data): Country
    {
        return Country::create($data);
    }

    /**
     * Update an existing country record.
     *
     * @param Country $country The country model to update
     * @param array $data The validated data for updating the country
     * @return Country The updated country model
     */
    public function updateCountry(Country $country, array $data): Country
    {
        $country->update($data);
        return $country;
    }
}
