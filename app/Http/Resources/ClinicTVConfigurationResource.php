<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicTVConfigurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->ClinicTVConfigurationID, // Primary key
            'clinic_id' => $this->ClinicID, // Foreign key to Clinic
            'clinic_name' => $this->ClinicName, // Name of the clinic
            'location' => $this->Location, // Location of the clinic
            'custom_text_1' => $this->CustomText1, // Custom text field 1
            'custom_text_2' => $this->CustomText2, // Custom text field 2
            'logo_path' => $this->LogoPath, // Path to the logo
            'clinic_logo' => $this->ClinicLogo, // Blob data for the clinic logo
            'main_screen_display_path' => $this->MainScreenDisplayPath, // Main screen display path
            'side_screen_display_path' => $this->SideScreenDisplayPath, // Side screen display path
            'video_display_path' => $this->VideoDisplayPath, // Video display path
            'appointment_display_flag' => $this->AppointmentDisplayFlag, // Appointment display flag
            'screen_display_flag' => $this->ScreenDisplayFlag, // Screen display flag
            'testimonial_display_flag' => $this->TestimonialDisplayFlag, // Testimonial display flag
            'side_screen_display_flag' => $this->SideScreenDisplayFlag, // Side screen display flag
            'media_screen_display_flag' => $this->MediaScreenDisplayFlag, // Media screen display flag
            'appointment_display_time_period' => $this->AppointmentDisplayTimePeriod, // Appointment display time period
            'screen_display_time_period' => $this->ScreenDisplayTimePeriod, // Screen display time period
            'testimonial_display_time_period' => $this->TestimonialDisplayTimePeriod, // Testimonial display time period
            'side_screen_display_time_period' => $this->SideScreenDisplayTimePeriod, // Side screen display time period
            'no_of_screens_per_cycle' => $this->NoOfScreensPerCycle, // Number of screens per cycle
            'no_of_testimonials_per_cycle' => $this->NoOfTestimonialPerCycle, // Number of testimonials per cycle
            'no_of_media_per_cycle' => $this->NoOfMediaPerCycle, // Number of media per cycle
            'is_newsticker_display' => $this->IsNewstickerDisplay, // News ticker display flag
            'is_deleted' => $this->IsDeleted, // Soft delete flag
            'created_on' => $this->CreatedOn, // Timestamp of creation
            'created_by' => $this->CreatedBy, // User who created the record
            'last_updated_on' => $this->LastUpdatedOn, // Timestamp of last update
            'last_updated_by' => $this->LastUpdatedBy, // User who last updated the record
        ];
    }
}