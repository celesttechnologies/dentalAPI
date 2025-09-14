<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDWSConfigProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicWebSiteID' => 'sometimes|string|max:255',
			'ProviderID' => 'sometimes|string|max:255',
			'ProviderName' => 'sometimes|string|max:255',
			'ProviderDescription' => 'sometimes|string|max:255',
			'ProviderContactNumber' => 'sometimes|string|max:255',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}