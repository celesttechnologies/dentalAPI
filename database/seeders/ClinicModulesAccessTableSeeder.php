<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicModulesAccessTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClinicModulesAccess')->delete();
        
        \DB::table('ClinicModulesAccess')->insert(array (
            0 => 
            array (
                'ClinicModuleAccessID' => '3A574621-D237-4E75-9A8C-006C23D5777C',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => 'FD1ECAB0-EE94-4D43-87E1-5190C5452BCB',
                'ModuleCode' => 'TVP',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '57280F85-E680-4FBF-BA10-E150B21DB931',
            ),
            1 => 
            array (
                'ClinicModuleAccessID' => '6F974621-D237-4E75-9A8C-006C23D5777C',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '067EE738-6684-4B46-81A3-BCC738B652DE',
                'ModuleCode' => 'UTI',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '57280F85-E680-4FBF-BA10-E150B21DB931',
            ),
            2 => 
            array (
                'ClinicModuleAccessID' => 'B3037A0B-805F-421E-925F-0BD04F3F463D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => 'A2112BA3-1885-41BF-8658-A7D0FEFBC9EB',
                'ModuleCode' => 'IVS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'D6A4616C-582E-4A95-B663-375EA1ACDCE8',
            ),
            3 => 
            array (
                'ClinicModuleAccessID' => '39D6DF27-957C-41FA-9208-1A65591ED566',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '7B7662BF-5D69-4304-8021-EF50E3C0A8E7',
                'ModuleCode' => 'APS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '4A8CE8A2-DDA5-4906-9AB8-90D664E97554',
            ),
            4 => 
            array (
                'ClinicModuleAccessID' => '94E3051E-23A6-4D07-AA50-4A000153A4A3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '68392084-5FFF-459D-9906-267DA65F82B8',
                'ModuleCode' => 'EIS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '19EAC941-8802-4277-B196-0B1EAE050C60',
            ),
            5 => 
            array (
                'ClinicModuleAccessID' => '2454AD7E-A188-41DE-9250-6317497FD858',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => 'BDB8ECFC-5EC9-46BE-9153-D3CAE5272DA2',
                'ModuleCode' => 'EDI',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'BE1AF370-9B40-4CEC-BBDB-0E200D54A07D',
            ),
            6 => 
            array (
                'ClinicModuleAccessID' => 'FA35EB96-53C6-4136-B1CB-69F92AF411EB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '0FEB7229-6407-491C-A5B0-DEEC370E253E',
                'ModuleCode' => 'LRS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'C1DBFD6E-198B-4C27-B81D-4A2E3B38D761',
            ),
            7 => 
            array (
                'ClinicModuleAccessID' => '5E27E4C8-081F-429A-A2EC-73E681F092F8',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '5CB89803-D5BB-4A2A-8454-08981986F71F',
                'ModuleCode' => 'SMS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '38723D29-8122-49A3-A661-253CDEA6E6A6',
            ),
            8 => 
            array (
                'ClinicModuleAccessID' => 'F0EA7D36-4691-4D16-88D8-86730FC9E9B4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '2F0BACB3-19EA-4368-B1AB-C8131991D3DC',
                'ModuleCode' => 'RTS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '9D38B28F-EDC7-4227-812B-DE0E88014E8F',
            ),
            9 => 
            array (
                'ClinicModuleAccessID' => 'E5931CEE-F2AC-42F4-B04D-90670928B56E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '3FC131B5-0DB4-431F-872B-166633518208',
                'ModuleCode' => 'DMS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '12E8B2FB-1481-4C91-A805-EDB890765A6B',
            ),
            10 => 
            array (
                'ClinicModuleAccessID' => 'F8CE1A1D-A987-4BD6-BBA5-97C6D66E7119',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => 'D27DDC06-D322-4E5D-AD71-079E5E2899DC',
                'ModuleCode' => 'EPR',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '3C71239E-A432-4307-B649-3ABF761A55E8',
            ),
            11 => 
            array (
                'ClinicModuleAccessID' => 'D0D0EF7C-4EEB-4B12-9084-A0908B218199',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '545CBA70-2AE5-43A4-BC89-03F3AE4463F2',
                'ModuleCode' => 'EXS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '939085BF-7624-4C54-9AC3-02A11580CABB',
            ),
            12 => 
            array (
                'ClinicModuleAccessID' => '510A3013-D883-448D-BF14-A92D8202B9CB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '98B937DD-644D-4DE1-AB20-5E8A2F1BC5F9',
                'ModuleCode' => 'BKP',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '3BC21E87-2A3B-4F6E-AACB-42B6E7B1494A',
            ),
            13 => 
            array (
                'ClinicModuleAccessID' => 'B0DC035D-F74D-42E6-B240-AB1BDB8DB307',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '2F1A1AD5-5E38-4831-8851-C38ECC3D18FD',
                'ModuleCode' => 'ADS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'C42122C2-4FEA-47CD-B661-8B57AC6BA536',
            ),
            14 => 
            array (
                'ClinicModuleAccessID' => '89CBCFE1-A27E-4159-9977-BE64FF1B99B9',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '7D38D579-432F-44A8-84D6-5D76DDF0CC4F',
                'ModuleCode' => 'RAS',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'DD53FFD8-C771-4BF4-BA2E-A60DC5999425',
            ),
            15 => 
            array (
                'ClinicModuleAccessID' => '910CE7A4-F864-4FF5-A483-DA7A54E3FA98',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => '3BC9AEEE-0DCD-4A6E-880D-31900161BC27',
                'ModuleCode' => 'ACT',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => '1D386A61-C011-499F-BBCA-37C64D47786A',
            ),
            16 => 
            array (
                'ClinicModuleAccessID' => 'CF1FD551-F962-417A-BD8D-DAE05FDF8B50',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'LicenseModuleID' => 'A3C6D944-26BB-47CC-984E-F2529298A52C',
                'ModuleCode' => 'BAM',
                'IsLicensed' => '1',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2013-09-12 10:25:31.170',
                'rowguid' => 'ECF8D106-8A09-4901-AF8C-BEAFD36539EC',
            ),
        ));
        
        
    }
}