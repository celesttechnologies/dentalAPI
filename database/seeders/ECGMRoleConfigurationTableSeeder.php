<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ECGMRoleConfigurationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ECG_M_RoleConfiguration')->delete();
        
        \DB::table('ECG_M_RoleConfiguration')->insert(array (
            0 => 
            array (
                'ClinicRoleID' => 'A1D0AEE3-6935-42FF-B163-4ABAE30D5F7C',
                'RoleID' => '86B48A1B-6E60-4A20-A20C-C66F7029953D',
                'LicenseModuleCodeCSV' => 'IVS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '6',
                'CreatedOn' => '2014-03-08 22:41:22.280',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:41:22.280',
                'LastUpdatedBy' => NULL,
            ),
            1 => 
            array (
                'ClinicRoleID' => 'AC7F0057-A75E-4223-B6ED-5B5F896C0E9D',
                'RoleID' => '7C7D137C-8327-4D70-9812-042AF4CDA291',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '2',
                'CreatedOn' => '2014-03-08 22:36:31.840',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:36:31.840',
                'LastUpdatedBy' => NULL,
            ),
            2 => 
            array (
                'ClinicRoleID' => 'DBF876CE-5827-4155-887A-7DD367099163',
                'RoleID' => '0D077E0C-A23D-40CB-A055-E2A8C278ABB2',
                'LicenseModuleCodeCSV' => 'LRS,APS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '4',
                'CreatedOn' => '2014-03-08 22:40:56.410',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:40:56.410',
                'LastUpdatedBy' => NULL,
            ),
            3 => 
            array (
                'ClinicRoleID' => '86D0B82E-49C1-46F1-967C-BEC940912961',
                'RoleID' => 'ECD75F1D-1232-4309-B8E9-A5293EC095CF',
                'LicenseModuleCodeCSV' => 'ACT,RTS',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '5',
                'CreatedOn' => '2014-03-08 22:39:23.100',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:39:23.100',
                'LastUpdatedBy' => NULL,
            ),
            4 => 
            array (
                'ClinicRoleID' => '6892497D-96A8-45F5-9989-CA2A4C1A2E54',
                'RoleID' => 'DDC35AB8-66B6-4331-9E37-60884973F680',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS,SMS,ADS,ACT,RTS,LRS,EIS,EXS,BAM,RAS,BKP,EDI,IVS,UTI,TVP',
                'IsAdministratorRole' => '1',
                'IsActive' => '1',
                'DefaultImportance' => '1',
                'CreatedOn' => '2014-03-08 22:36:55.037',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:36:55.037',
                'LastUpdatedBy' => NULL,
            ),
            5 => 
            array (
                'ClinicRoleID' => 'D0900FFA-D490-4262-A3EC-EA58A5B0B343',
                'RoleID' => '5973E31F-A329-4E2D-8541-C98D1E22CF81',
                'LicenseModuleCodeCSV' => 'EPR,APS,DMS,SMS,EIS,LRS,UTI',
                'IsAdministratorRole' => '0',
                'IsActive' => '1',
                'DefaultImportance' => '3',
                'CreatedOn' => '2014-03-08 22:37:52.350',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-03-08 22:37:52.350',
                'LastUpdatedBy' => NULL,
            ),
        ));
        
        
    }
}