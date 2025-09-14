<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDWSConfigWebsiteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ClinicURL' => 'sometimes|string',
			'ClinicName' => 'sometimes|string',
			'ClinicDescription' => 'sometimes|string',
			'ClinicAddress' => 'sometimes|string',
			'City' => 'sometimes|string',
			'State' => 'sometimes|string',
			'ZipCode' => 'sometimes|string',
			'PhoneNumber' => 'sometimes|string',
			'ClinicMapPath' => 'sometimes|string',
			'AboutHeadDoctor' => 'sometimes|string',
			'DefaultThemeID' => 'sometimes|string|max:255',
			'DefaultLanguageID' => 'sometimes|string|max:255',
			'FacebookURL' => 'sometimes|string',
			'LinkedInURL' => 'sometimes|string',
			'TwitterURL' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
			'ClinicLogo' => 'sometimes|string',
			'ContactEmail' => 'sometimes|email|max:255',
			'SubDomain' => 'sometimes|string',
        ];
    }
}