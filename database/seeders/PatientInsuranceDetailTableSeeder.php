<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientInsuranceDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Patient_InsuranceDetail')->delete();
        
        \DB::table('Patient_InsuranceDetail')->insert(array (
            0 => 
            array (
                'PatientInsuranceID' => '481FC199-C9E7-480B-A120-5E196065A6C1',
                'PatientID' => 'FDEFDA02-8CF8-429F-A28C-DF1C34563614',
                'IsDentalInsurance' => '0',
                'IsOrthodonticInsurance' => '0',
                'PrimaryInsurerName' => '',
                'PrimarySubscriberID' => '',
                'PrimaryGroupNo' => '',
                'SecondaryInsurerName' => '',
                'SecondarySubscriberID' => '',
                'SecondaryGroupNo' => '',
                'TertiaryInsurerName' => '',
                'TertiarySubscriberID' => '',
                'TertiaryGroupNo' => '',
                'CreatedOn' => '2024-07-23 17:19:56.023',
                'CreatedBy' => 'fdefda02-8cf8-429f-a28c-df1c34563614',
                'LastUpdatedOn' => '2024-07-23 17:19:56.023',
                'LastUpdatedBy' => 'fdefda02-8cf8-429f-a28c-df1c34563614',
            ),
            1 => 
            array (
                'PatientInsuranceID' => '7B416028-8BA5-4A48-A65A-EF71FCE0FFDC',
                'PatientID' => '301061F2-F954-4C0D-9F9E-6523D705AB40',
                'IsDentalInsurance' => '0',
                'IsOrthodonticInsurance' => '0',
                'PrimaryInsurerName' => '',
                'PrimarySubscriberID' => '',
                'PrimaryGroupNo' => '',
                'SecondaryInsurerName' => '',
                'SecondarySubscriberID' => '',
                'SecondaryGroupNo' => '',
                'TertiaryInsurerName' => '',
                'TertiarySubscriberID' => '',
                'TertiaryGroupNo' => '',
                'CreatedOn' => '2022-04-21 18:14:56.923',
                'CreatedBy' => '301061f2-f954-4c0d-9f9e-6523d705ab40',
                'LastUpdatedOn' => '2022-04-21 18:14:56.927',
                'LastUpdatedBy' => '301061f2-f954-4c0d-9f9e-6523d705ab40',
            ),
        ));
        
        
    }
}