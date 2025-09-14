<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientMedicalCertificatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientMedicalCertificates')->delete();
        
        \DB::table('PatientMedicalCertificates')->insert(array (
            0 => 
            array (
                'PatientMedicalCertificateID' => '564A31BF-5ADF-4A13-BFB4-03394711A549',
                'PatientID' => 'A37404FB-83A1-4D27-80F8-52356E432702',
                'ProviderID' => '5CEF8EDF-3289-4A9D-BD8D-CC5DF92EF46C',
                'DateFrom' => '2021-05-17 00:00:00.000',
                'DateTo' => '2021-05-20 00:00:00.000',
                'Reason' => ' pain with tooth number 15 since 17/05/21 and undergone tooth extraction on 19/05/21',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-05-20 12:46:13.063',
                'CreatedBy' => 'mitali',
                'LastUpdatedOn' => '2021-05-20 12:47:15.043',
                'LastUpdatedBy' => '',
                'rowguid' => 'EEB984DC-BA0C-4807-8B5A-6B8E9EAECAFA',
                'OutPatientOn' => NULL,
                'InPatientFrom' => '2021-05-17 00:00:00.000',
                'InPatientTo' => '2021-05-20 00:00:00.000',
                'CertificateTypeID' => '1',
            ),
            1 => 
            array (
                'PatientMedicalCertificateID' => '97C4343B-9C77-4ADE-BDEB-225B0EF58B65',
                'PatientID' => '66983ECC-18EC-45AD-A15A-0A008F219E6B',
                'ProviderID' => 'E9BA26E6-B4B4-4B1A-AACB-293C31E7EBF8',
                'DateFrom' => '2021-08-25 00:00:00.000',
                'DateTo' => '2021-08-26 00:00:00.000',
                'Reason' => 'implant surgery in tooth no. 36',
                'IsDeleted' => '1',
                'CreatedOn' => '2021-08-25 20:09:04.157',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2021-08-25 20:12:51.057',
                'LastUpdatedBy' => '',
                'rowguid' => 'BA731297-DB0B-4F29-A5F3-1C4C6A9D624A',
                'OutPatientOn' => '2021-08-25 00:00:00.000',
                'InPatientFrom' => '2021-08-25 00:00:00.000',
                'InPatientTo' => '2021-08-26 00:00:00.000',
                'CertificateTypeID' => '1',
            ),
            2 => 
            array (
                'PatientMedicalCertificateID' => '419FBD57-075A-43D7-B297-D7B4FFDE56C3',
                'PatientID' => 'A37404FB-83A1-4D27-80F8-52356E432702',
                'ProviderID' => '5CEF8EDF-3289-4A9D-BD8D-CC5DF92EF46C',
                'DateFrom' => '2021-05-17 00:00:00.000',
                'DateTo' => '2021-05-20 00:00:00.000',
                'Reason' => 'pain with tooth number 15 since 17/05/21, and has undergone tooth extraction on 19/05/21. He is fit to resume work from 21/05/21.',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-05-20 12:58:30.347',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-05-20 12:58:30.347',
                'LastUpdatedBy' => NULL,
                'rowguid' => 'C5AB974B-AAEC-4C54-9FDA-F5788F2E63F0',
                'OutPatientOn' => NULL,
                'InPatientFrom' => '2021-05-17 00:00:00.000',
                'InPatientTo' => '2021-05-20 00:00:00.000',
                'CertificateTypeID' => '1',
            ),
            3 => 
            array (
                'PatientMedicalCertificateID' => '627C4E2F-A1C3-4CFF-9917-DA4DC9191681',
                'PatientID' => 'AC287121-8FA4-4806-9AD5-6835154BC731',
                'ProviderID' => '37A8CCBF-024D-4FA9-B5C4-963A11ACC3CE',
                'DateFrom' => '2024-07-23 00:00:00.000',
                'DateTo' => '2024-07-25 00:00:00.000',
                'Reason' => 'tooth pain ',
                'IsDeleted' => '0',
                'CreatedOn' => '2024-07-23 18:37:35.367',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2024-07-23 18:37:35.367',
                'LastUpdatedBy' => NULL,
                'rowguid' => '5FBDDEC2-3CDE-4A9D-9634-3F0055671B7F',
                'OutPatientOn' => '2024-07-26 00:00:00.000',
                'InPatientFrom' => '2024-07-22 00:00:00.000',
                'InPatientTo' => '2024-07-25 00:00:00.000',
                'CertificateTypeID' => '1',
            ),
        ));
        
        
    }
}