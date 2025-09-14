<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientExaminationDiagnosisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientExaminationDiagnosis')->delete();
        
        \DB::table('PatientExaminationDiagnosis')->insert(array (
            0 => 
            array (
                'PatientExaminationDiagnosisID' => 'EF5A72AE-D68C-4751-A8C0-2EE883877B89',
                'PatientExaminationID' => '8E6E032B-97A4-4B99-85AB-3438E230680F',
                'TreatmentTypeID' => '10',
                'Description' => 'Mottled Teeth',
                'TeethTreatments' => 'LU8',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-28 10:05:04.783',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-28 10:05:04.783',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            1 => 
            array (
                'PatientExaminationDiagnosisID' => '9557BD72-28E6-40FC-928A-3025166193FC',
                'PatientExaminationID' => '8E4FBEB7-D51E-4B1D-ABCC-8663E97457B7',
                'TreatmentTypeID' => '28',
                'Description' => 'Deposits On Teeth(e.g. Calculus or Ext. Staining0',
                    'TeethTreatments' => 'RB5',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2020-07-27 10:42:13.120',
                    'CreatedBy' => 'administrator@ecgplus.com',
                    'LastUpdatedOn' => '2020-07-27 10:42:13.120',
                    'LastUpdatedBy' => 'administrator@ecgplus.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                2 => 
                array (
                    'PatientExaminationDiagnosisID' => '9FB4E674-6B01-4A7F-BFED-422DA3A1CA50',
                    'PatientExaminationID' => 'E080ECA9-F822-40AE-AEC0-DA4EDB06A4E0',
                    'TreatmentTypeID' => '129',
                    'Description' => '',
                    'TeethTreatments' => 'LU8',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2024-02-19 11:00:51.340',
                    'CreatedBy' => 'karuna@drvorasdental.com',
                    'LastUpdatedOn' => '2024-02-19 11:00:51.340',
                    'LastUpdatedBy' => 'karuna@drvorasdental.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                3 => 
                array (
                    'PatientExaminationDiagnosisID' => 'B686F9AE-ED6E-46B6-BA8F-8D68809AA6BB',
                    'PatientExaminationID' => '0EBD9350-42F2-4B3D-9A47-FF0BF947F3D8',
                    'TreatmentTypeID' => '14',
                    'Description' => 'Teething Syndrome',
                    'TeethTreatments' => '',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2020-07-28 12:22:05.330',
                    'CreatedBy' => 'administrator@ecgplus.com',
                    'LastUpdatedOn' => '2020-07-28 12:22:37.363',
                    'LastUpdatedBy' => 'administrator@ecgplus.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                4 => 
                array (
                    'PatientExaminationDiagnosisID' => '89DB64E0-08BD-4EA2-8B96-90F9F5621E5C',
                    'PatientExaminationID' => '93E7CBD8-D850-419A-B100-C42E332CFE2B',
                    'TreatmentTypeID' => '129',
                    'Description' => '',
                    'TeethTreatments' => 'LU7',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2021-05-16 11:47:27.903',
                    'CreatedBy' => 'naman',
                    'LastUpdatedOn' => '2021-05-16 11:47:27.903',
                    'LastUpdatedBy' => 'naman',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                5 => 
                array (
                    'PatientExaminationDiagnosisID' => '91B55429-A846-4639-935D-95D5A83B2D8D',
                    'PatientExaminationID' => '1BA186B4-42DF-4E2A-99DE-7554237F9D3D',
                    'TreatmentTypeID' => '8',
                    'Description' => 'Supermumary Teeth',
                    'TeethTreatments' => '',
                    'IsDeleted' => '1',
                    'CreatedOn' => '2020-07-29 16:24:28.890',
                    'CreatedBy' => 'administrator@ecgplus.com',
                    'LastUpdatedOn' => '2020-07-29 16:26:09.007',
                    'LastUpdatedBy' => 'administrator@ecgplus.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                6 => 
                array (
                    'PatientExaminationDiagnosisID' => '8AA22624-FE2F-4B89-A858-CE68F1AFF749',
                    'PatientExaminationID' => '0EBD9350-42F2-4B3D-9A47-FF0BF947F3D8',
                    'TreatmentTypeID' => '19',
                    'Description' => 'Caries In Dentine',
                    'TeethTreatments' => '',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2020-07-28 12:22:05.330',
                    'CreatedBy' => 'administrator@ecgplus.com',
                    'LastUpdatedOn' => '2020-07-28 12:22:37.363',
                    'LastUpdatedBy' => 'administrator@ecgplus.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                7 => 
                array (
                    'PatientExaminationDiagnosisID' => '181890E4-6C37-4880-A75F-D686328940A5',
                    'PatientExaminationID' => '1BA186B4-42DF-4E2A-99DE-7554237F9D3D',
                    'TreatmentTypeID' => '7',
                    'Description' => 'Anodontia',
                    'TeethTreatments' => '',
                    'IsDeleted' => '1',
                    'CreatedOn' => '2020-07-29 16:24:28.887',
                    'CreatedBy' => 'administrator@ecgplus.com',
                    'LastUpdatedOn' => '2020-07-29 16:26:09.007',
                    'LastUpdatedBy' => 'administrator@ecgplus.com',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
                8 => 
                array (
                    'PatientExaminationDiagnosisID' => 'F851B1DE-5395-4E6D-8709-DAA255520499',
                    'PatientExaminationID' => '073A2A64-CB5D-44F4-9DE4-5E23E63D9EDF',
                    'TreatmentTypeID' => '129',
                    'Description' => '',
                    'TeethTreatments' => '',
                    'IsDeleted' => '0',
                    'CreatedOn' => '2021-07-25 11:43:01.970',
                    'CreatedBy' => 'naman',
                    'LastUpdatedOn' => '2021-07-25 11:43:01.970',
                    'LastUpdatedBy' => 'naman',
                    'rowguid' => '00000000-0000-0000-0000-000000000000',
                ),
            ));
        
        
    }
}