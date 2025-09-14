<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LicenseModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('LicenseModules')->delete();
        
        \DB::table('LicenseModules')->insert(array (
            0 => 
            array (
                'LicenseModuleID' => '545CBA70-2AE5-43A4-BC89-03F3AE4463F2',
                'ModuleCode' => 'EXS',
                'ModuleName' => 'Expense Management System',
                'ModuleDescription' => 'Expense Management System',
                'OrderNumber' => '9',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 14:59:01.327',
                'CreatedBy' => 'Admin',
            ),
            1 => 
            array (
                'LicenseModuleID' => 'D27DDC06-D322-4E5D-AD71-079E5E2899DC',
                'ModuleCode' => 'EPR',
                'ModuleName' => 'Patient Record Management System',
                'ModuleDescription' => 'Patient Record Management System',
                'OrderNumber' => '1',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 14:52:53.170',
                'CreatedBy' => 'Admin',
            ),
            2 => 
            array (
                'LicenseModuleID' => '5CB89803-D5BB-4A2A-8454-08981986F71F',
                'ModuleCode' => 'SMS',
                'ModuleName' => 'SMS Integration System',
                'ModuleDescription' => 'SMS Integration SYSTEM',
                'OrderNumber' => '7',
                'PreRequisitesCSV' => 'EPR,EAS',
                'CreatedOn' => '2011-08-02 14:55:47.890',
                'CreatedBy' => 'Admin',
            ),
            3 => 
            array (
                'LicenseModuleID' => '3FC131B5-0DB4-431F-872B-166633518208',
                'ModuleCode' => 'DMS',
                'ModuleName' => 'Document Management System',
                'ModuleDescription' => 'Document Management System',
                'OrderNumber' => '3',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 14:53:43.560',
                'CreatedBy' => 'Admin',
            ),
            4 => 
            array (
                'LicenseModuleID' => '68392084-5FFF-459D-9906-267DA65F82B8',
                'ModuleCode' => 'EIS',
                'ModuleName' => 'Email Integration System',
                'ModuleDescription' => 'Email Integration System',
                'OrderNumber' => '6',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 14:55:15.090',
                'CreatedBy' => 'Admin',
            ),
            5 => 
            array (
                'LicenseModuleID' => '3BC9AEEE-0DCD-4A6E-880D-31900161BC27',
                'ModuleCode' => 'ACT',
                'ModuleName' => 'Accounts',
                'ModuleDescription' => 'Accounts',
                'OrderNumber' => '4',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 00:00:00.000',
                'CreatedBy' => 'Admin',
            ),
            6 => 
            array (
                'LicenseModuleID' => 'FD1ECAB0-EE94-4D43-87E1-5190C5452BCB',
                'ModuleCode' => 'TVP',
                'ModuleName' => 'TV Plus',
                'ModuleDescription' => 'TV Plus',
                'OrderNumber' => '17',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2014-02-21 13:32:31.000',
                'CreatedBy' => 'Admin',
            ),
            7 => 
            array (
                'LicenseModuleID' => '7D38D579-432F-44A8-84D6-5D76DDF0CC4F',
                'ModuleCode' => 'RAS',
                'ModuleName' => 'Reports Analysis System',
                'ModuleDescription' => 'Reports Analysis System',
                'OrderNumber' => '12',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 15:01:44.873',
                'CreatedBy' => 'Admin',
            ),
            8 => 
            array (
                'LicenseModuleID' => '98B937DD-644D-4DE1-AB20-5E8A2F1BC5F9',
                'ModuleCode' => 'BKP',
                'ModuleName' => 'Online BackUp Management',
                'ModuleDescription' => 'Online BackUp Management',
                'OrderNumber' => '13',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 15:02:13.077',
                'CreatedBy' => 'Admin',
            ),
            9 => 
            array (
                'LicenseModuleID' => 'A2112BA3-1885-41BF-8658-A7D0FEFBC9EB',
                'ModuleCode' => 'IVS',
                'ModuleName' => 'Inventory System',
                'ModuleDescription' => 'Inventory System',
                'OrderNumber' => '15',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 14:54:50.717',
                'CreatedBy' => 'Admin',
            ),
            10 => 
            array (
                'LicenseModuleID' => '067EE738-6684-4B46-81A3-BCC738B652DE',
                'ModuleCode' => 'UTI',
                'ModuleName' => 'Utilities',
                'ModuleDescription' => 'Utilities',
                'OrderNumber' => '16',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-30 15:04:14.823',
                'CreatedBy' => 'Admin',
            ),
            11 => 
            array (
                'LicenseModuleID' => '2F1A1AD5-5E38-4831-8851-C38ECC3D18FD',
                'ModuleCode' => 'ADS',
                'ModuleName' => 'Administration System',
                'ModuleDescription' => 'Administration System',
                'OrderNumber' => '5',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 14:57:58.700',
                'CreatedBy' => 'Admin',
            ),
            12 => 
            array (
                'LicenseModuleID' => '2F0BACB3-19EA-4368-B1AB-C8131991D3DC',
                'ModuleCode' => 'RTS',
                'ModuleName' => 'Reports Transaction Analysis',
                'ModuleDescription' => 'Reports Transaction Analysis',
                'OrderNumber' => '11',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 15:00:17.640',
                'CreatedBy' => 'Admin',
            ),
            13 => 
            array (
                'LicenseModuleID' => 'BDB8ECFC-5EC9-46BE-9153-D3CAE5272DA2',
                'ModuleCode' => 'EDI',
                'ModuleName' => 'Electronic Data Interface',
                'ModuleDescription' => 'Electronic Data Interface',
                'OrderNumber' => '14',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-30 15:03:40.973',
                'CreatedBy' => 'Admin',
            ),
            14 => 
            array (
                'LicenseModuleID' => '0FEB7229-6407-491C-A5B0-DEEC370E253E',
                'ModuleCode' => 'LRS',
                'ModuleName' => 'Lab Recod System',
                'ModuleDescription' => 'Lab Record System',
                'OrderNumber' => '8',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 14:53:19.733',
                'CreatedBy' => 'Admin',
            ),
            15 => 
            array (
                'LicenseModuleID' => '7B7662BF-5D69-4304-8021-EF50E3C0A8E7',
                'ModuleCode' => 'APS',
                'ModuleName' => 'Appointment System',
                'ModuleDescription' => 'Appointment System',
                'OrderNumber' => '2',
                'PreRequisitesCSV' => 'EPR',
                'CreatedOn' => '2011-08-02 14:52:53.170',
                'CreatedBy' => 'Admin',
            ),
            16 => 
            array (
                'LicenseModuleID' => 'A3C6D944-26BB-47CC-984E-F2529298A52C',
                'ModuleCode' => 'BAM',
                'ModuleName' => 'Bank Accounts Management',
                'ModuleDescription' => 'Banks Accounts Management',
                'OrderNumber' => '10',
                'PreRequisitesCSV' => NULL,
                'CreatedOn' => '2011-08-02 14:59:16.983',
                'CreatedBy' => 'Admin',
            ),
        ));
        
        
    }
}