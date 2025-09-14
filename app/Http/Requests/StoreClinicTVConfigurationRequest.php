<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicTVConfigurationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'ClinicID' => 'required|string|max:255',
			'ClinicName' => 'required|string',
			'Location' => 'required|string',
			'CustomText1' => 'required|string',
			'CustomText2' => 'required|string',
			'LogoPath' => 'required|string',
			'ClinicLogo' => 'required|string',
			'MainScreenDisplayPath' => 'required|string',
			'SideScreenDisplayPath' => 'required|string|max:255',
			'VideoDisplayPath' => 'required|string|max:255',
			'AppointmentDisplayFlag' => 'required|string',
			'ScreenDisplayFlag' => 'required|string',
			'TestimonialDisplayFlag' => 'required|string',
			'SideScreenDisplayFlag' => 'required|string|max:255',
			'MediaScreenDisplayFlag' => 'required|string',
			'AppointmentDisplayTimePeriod' => 'required|string',
			'ScreenDisplayTimePeriod' => 'required|string',
			'TestimonialDisplayTimePeriod' => 'required|string',
			'SideScreenDisplayTimePeriod' => 'required|string|max:255',
			'NoOfScreensPerCycle' => 'required|string',
			'NoOfTestimonialPerCycle' => 'required|string',
			'NoOfMediaPerCycle' => 'required|string',
			'IsNewstickerDisplay' => 'required|string',
			'IsDeleted' => 'required|string',
			'CreatedOn' => 'required|string',
			'CreatedBy' => 'required|string',
			'LastUpdatedOn' => 'required|date',
			'LastUpdatedBy' => 'required|date',
        ];
    }
}