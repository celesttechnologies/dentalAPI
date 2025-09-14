<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicTVConfigurationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'sometimes|string|max:255',
			'ClinicName' => 'sometimes|string',
			'Location' => 'sometimes|string',
			'CustomText1' => 'sometimes|string',
			'CustomText2' => 'sometimes|string',
			'LogoPath' => 'sometimes|string',
			'ClinicLogo' => 'sometimes|string',
			'MainScreenDisplayPath' => 'sometimes|string',
			'SideScreenDisplayPath' => 'sometimes|string|max:255',
			'VideoDisplayPath' => 'sometimes|string|max:255',
			'AppointmentDisplayFlag' => 'sometimes|string',
			'ScreenDisplayFlag' => 'sometimes|string',
			'TestimonialDisplayFlag' => 'sometimes|string',
			'SideScreenDisplayFlag' => 'sometimes|string|max:255',
			'MediaScreenDisplayFlag' => 'sometimes|string',
			'AppointmentDisplayTimePeriod' => 'sometimes|string',
			'ScreenDisplayTimePeriod' => 'sometimes|string',
			'TestimonialDisplayTimePeriod' => 'sometimes|string',
			'SideScreenDisplayTimePeriod' => 'sometimes|string|max:255',
			'NoOfScreensPerCycle' => 'sometimes|string',
			'NoOfTestimonialPerCycle' => 'sometimes|string',
			'NoOfMediaPerCycle' => 'sometimes|string',
			'IsNewstickerDisplay' => 'sometimes|string',
			'IsDeleted' => 'sometimes|string',
			'CreatedOn' => 'sometimes|string',
			'CreatedBy' => 'sometimes|string',
			'LastUpdatedOn' => 'sometimes|date',
			'LastUpdatedBy' => 'sometimes|date',
        ];
    }
}