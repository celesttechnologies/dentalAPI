<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ECGClinicRoleConfigurationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ECG_Clinic_RoleConfiguration')->delete();
        
        \DB::table('ECG_Clinic_RoleConfiguration')->insert(array (
            0 => 
            array (
                'ClinicRoleID' => 'FF62B75B-C6F4-4C08-AE4E-446CE82C4129',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => '0D077E0C-A23D-40CB-A055-E2A8C278ABB2',
                'LicenseModuleCodeCSV' => 'APS,ACT,LRS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '4',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.900',
                'LastUpdatedBy' => 'SYSTEM',
            ),
            1 => 
            array (
                'ClinicRoleID' => 'C08D725E-8A3E-4FB1-AB4C-786328E9DD42',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => 'DDC35AB8-66B6-4331-9E37-60884973F680',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS,ACT,ADS,EIS,SMS,LRS,EXS,BAM,RTS,RAS,BKP,EDI,IVS,UTI,TVP',
                'IsAdministratorRole' => '1',
                'IsActive' => '1',
                'DefaultImportance' => '1',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.893',
                'LastUpdatedBy' => 'SYSTEM',
            ),
            2 => 
            array (
                'ClinicRoleID' => '5778F179-EC5A-4152-BF75-7A65DC8CD034',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => '7C7D137C-8327-4D70-9812-042AF4CDA291',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS,ACT,SMS,LRS,EXS,RTS,RAS,IVS,UTI',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '2',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.897',
                'LastUpdatedBy' => 'SYSTEM',
            ),
            3 => 
            array (
                'ClinicRoleID' => '9CC56535-2F82-458D-A995-999D96E2FAB4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => 'ECD75F1D-1232-4309-B8E9-A5293EC095CF',
                'LicenseModuleCodeCSV' => 'ACT,RTS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '5',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.900',
                'LastUpdatedBy' => 'SYSTEM',
            ),
            4 => 
            array (
                'ClinicRoleID' => '2CDDF8D6-C134-4698-A2DA-BA4AA2D6C858',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => '86B48A1B-6E60-4A20-A20C-C66F7029953D',
                'LicenseModuleCodeCSV' => 'ACT,IVS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '6',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.900',
                'LastUpdatedBy' => 'SYSTEM',
            ),
            5 => 
            array (
                'ClinicRoleID' => '5F7364DE-9BDC-4CE3-B02E-C68C7FAF9DBA',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'RoleID' => '5973E31F-A329-4E2D-8541-C98D1E22CF81',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS,EIS,SMS,LRS,UTI',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '3',
                'CreatedOn' => '2014-05-28 18:51:40.393',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-10-08 10:43:38.897',
                'LastUpdatedBy' => 'SYSTEM',
            ),
        ));
        
        
    }
}