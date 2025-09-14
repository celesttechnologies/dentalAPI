<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientInvestigationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientInvestigations')->delete();
        
        \DB::table('PatientInvestigations')->insert(array (
            0 => 
            array (
                'PatientInvestigationID' => 'B18CC204-2079-43C8-8442-098155D303B8',
                'PatientID' => 'A907B627-BCF7-41AD-9E9B-903AABE0CFA6',
                'DateOfInvestigation' => '2023-09-17 14:56:20.440',
                'Weight' => '12kg',
                'BloodPressure' => '',
                'FBS' => '',
                'PLBS' => '',
                'HbAC' => '',
                'LDL' => '',
                'ACR' => '',
                'Retina' => '',
                'Urine' => '',
                'Others' => '',
                'Custom1' => NULL,
                'Custom2' => NULL,
                'Custom3' => NULL,
                'Custom4' => NULL,
                'Custom5' => NULL,
                'Custom6' => NULL,
                'Custom7' => NULL,
                'Custom8' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => 'seema@drvorasdental.com',
                'CreatedOn' => '2023-09-17 14:57:16.230',
                'LastUpdatedBy' => 'seema@drvorasdental.com',
                'LastUpdatedOn' => '2023-09-17 14:57:16.230',
                'rowguid' => NULL,
            ),
            1 => 
            array (
                'PatientInvestigationID' => 'E763A292-8A94-4FAA-8587-28BBF7E3CA31',
                'PatientID' => '235A1443-670F-4505-8328-55382C161737',
                'DateOfInvestigation' => '2020-08-10 22:37:41.270',
                'Weight' => '',
                'BloodPressure' => '',
                'FBS' => '',
                'PLBS' => '',
                'HbAC' => '',
                'LDL' => '',
                'ACR' => '',
                'Retina' => '1111',
                'Urine' => '',
                'Others' => NULL,
                'Custom1' => NULL,
                'Custom2' => NULL,
                'Custom3' => NULL,
                'Custom4' => NULL,
                'Custom5' => NULL,
                'Custom6' => NULL,
                'Custom7' => NULL,
                'Custom8' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-08-10 22:37:56.147',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-10 22:39:29.237',
                'rowguid' => NULL,
            ),
            2 => 
            array (
                'PatientInvestigationID' => 'CEC20F1D-0DD8-428E-A0FE-BB12C1505364',
                'PatientID' => 'BE75A56A-0FA5-4240-8CF4-28E5788DEF30',
                'DateOfInvestigation' => '2020-08-06 12:54:21.380',
                'Weight' => '',
                'BloodPressure' => '',
                'FBS' => '',
                'PLBS' => '',
                'HbAC' => '10',
                'LDL' => '',
                'ACR' => '',
                'Retina' => '',
                'Urine' => '',
                'Others' => NULL,
                'Custom1' => NULL,
                'Custom2' => NULL,
                'Custom3' => NULL,
                'Custom4' => NULL,
                'Custom5' => NULL,
                'Custom6' => NULL,
                'Custom7' => NULL,
                'Custom8' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-08-06 12:59:04.650',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-06 13:02:19.300',
                'rowguid' => NULL,
            ),
            3 => 
            array (
                'PatientInvestigationID' => '4EBD991E-9D19-466D-8BC5-C2FEAF57565C',
                'PatientID' => '01B0C3E7-75C7-4E44-B2BF-5A4958C01B55',
                'DateOfInvestigation' => '2023-11-18 13:25:53.603',
                'Weight' => '66',
                'BloodPressure' => '',
                'FBS' => '',
                'PLBS' => '',
                'HbAC' => '',
                'LDL' => '',
                'ACR' => '',
                'Retina' => '',
                'Urine' => '',
                'Others' => 'ASTHAMA',
                'Custom1' => NULL,
                'Custom2' => NULL,
                'Custom3' => NULL,
                'Custom4' => NULL,
                'Custom5' => NULL,
                'Custom6' => NULL,
                'Custom7' => NULL,
                'Custom8' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'CreatedOn' => '2023-11-18 13:25:56.980',
                'LastUpdatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2023-11-18 13:25:56.980',
                'rowguid' => NULL,
            ),
            4 => 
            array (
                'PatientInvestigationID' => '5E2ED415-8695-4BB3-A3A3-CFB057A4A54E',
                'PatientID' => '6DAAF65F-D624-4C79-8AA4-913AD5E6D968',
                'DateOfInvestigation' => '2020-07-31 10:09:08.603',
                'Weight' => '',
                'BloodPressure' => '120/80',
                'FBS' => '',
                'PLBS' => '',
                'HbAC' => '',
                'LDL' => '',
                'ACR' => '',
                'Retina' => '',
                'Urine' => '',
                'Others' => '',
                'Custom1' => NULL,
                'Custom2' => NULL,
                'Custom3' => NULL,
                'Custom4' => NULL,
                'Custom5' => NULL,
                'Custom6' => NULL,
                'Custom7' => NULL,
                'Custom8' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-31 10:11:22.807',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-31 10:11:22.807',
                'rowguid' => NULL,
            ),
        ));
        
        
    }
}