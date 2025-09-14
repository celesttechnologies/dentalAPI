<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicTVConfigurationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Clinic_TV_Configuration')->delete();
        
        \DB::table('Clinic_TV_Configuration')->insert(array (
            0 => 
            array (
                'ClinicTVConfigurationID' => '76D67BD5-62A4-4660-A4F5-BDF1ECDB0570',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClinicName' => 'White Smile Dentistry',
                'Location' => '',
                'CustomText1' => 'Way no. 1829, Bldg No 2021',
                'CustomText2' => 'ClinicTimings - 9:00 - 10:00 PM',
                'LogoPath' => 'D:\\ECGWAContents\\LogoFolder',
                'ClinicLogo' => NULL,
                'MainScreenDisplayPath' => 'D:\\ECGWAContents\\ECGWAAppImages',
                'SideScreenDisplayPath' => 'D:\\ECGWAContents\\AdvFolder',
                'VideoDisplayPath' => 'D:\\ECGWAContents\\ECGWAVideos',
                'AppointmentDisplayFlag' => '1',
                'ScreenDisplayFlag' => '1',
                'TestimonialDisplayFlag' => '1',
                'SideScreenDisplayFlag' => '1',
                'MediaScreenDisplayFlag' => NULL,
                'AppointmentDisplayTimePeriod' => '30',
                'ScreenDisplayTimePeriod' => '30',
                'TestimonialDisplayTimePeriod' => '30',
                'SideScreenDisplayTimePeriod' => NULL,
                'NoOfScreensPerCycle' => '3',
                'NoOfTestimonialPerCycle' => '3',
                'NoOfMediaPerCycle' => NULL,
                'IsNewstickerDisplay' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2013-02-13 16:38:08.267',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2013-02-13 16:38:08.267',
                'LastUpdatedBy' => NULL,
            ),
        ));
        
        
    }
}