<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDWSConfigWebsiteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'ClinicURL' => 'required|string',
			'ClinicName' => 'required|string',
			'ClinicDescription' => 'required|string',
			'ClinicAddress' => 'required|string',
			'City' => 'required|string',
			'State' => 'required|string',
			'ZipCode' => 'required|string',
			'PhoneNumber' => 'required|string',
			'ClinicMapPath' => 'required|string',
			'AboutHeadDoctor' => 'required|string',
			'DefaultThemeID' => 'required|string|max:255',
			'DefaultLanguageID' => 'required|string|max:255',
			'FacebookURL' => 'required|string',
			'LinkedInURL' => 'required|string',
			'TwitterURL' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
			'ClinicLogo' => 'required|string',
			'ContactEmail' => 'required|email|max:255',
			'SubDomain' => 'required|string',
        ];
    }
}