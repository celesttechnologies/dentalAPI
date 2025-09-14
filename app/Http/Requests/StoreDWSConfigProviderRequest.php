<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDWSConfigProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicWebSiteID' => 'required|string|max:255',
			'ProviderID' => 'required|string|max:255',
			'ProviderName' => 'required|string|max:255',
			'ProviderDescription' => 'required|string|max:255',
			'ProviderContactNumber' => 'required|string|max:255',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}