<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LookUpsMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('LookUpsMaster')->delete();
        
        \DB::table('LookUpsMaster')->insert(array (
            0 => 
            array (
                'LookUpMasterID' => '7E0E1784-EA2F-4796-B5D0-059E0D33E1D0',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'PatientOrthodonticAssessmentAttribute',
                'ItemCategoryDescription' => 'PatientOrthodonticAssessmentAttribute',
                'IsDeleted' => '0',
                'Importance' => '27',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2014-08-11 16:45:00.727',
            ),
            1 => 
            array (
                'LookUpMasterID' => '26059B6A-FBAF-40E5-A78C-06843977E978',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Dosage',
                'ItemCategoryDescription' => 'Dosage',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            2 => 
            array (
                'LookUpMasterID' => '5114AA38-8FF1-439B-9227-0C492937B1D1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'ReferenceSource',
                'ItemCategoryDescription' => 'ReferenceSource',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            3 => 
            array (
                'LookUpMasterID' => 'CFFD6010-31BC-470C-AD7C-19510318E793',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Denture',
                'ItemCategoryDescription' => 'Denture',
                'IsDeleted' => '1',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            4 => 
            array (
                'LookUpMasterID' => 'FFDEB78A-D4D0-47FC-8675-341813645032',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'ExpenseIN',
                'ItemCategoryDescription' => 'Receipt',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            5 => 
            array (
                'LookUpMasterID' => '989906A0-D4E1-4596-8F70-47E61006B3F4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'CreditCardName',
                'ItemCategoryDescription' => 'CreditCardName',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            6 => 
            array (
                'LookUpMasterID' => '35C44168-EBF5-49BA-9495-7167B4F08AD3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'MedicalDisease',
                'ItemCategoryDescription' => 'MedicalDisease',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            7 => 
            array (
                'LookUpMasterID' => '9B8DEBD2-42E1-4954-82AC-80FD6FE88763',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'MedicalCondition',
                'ItemCategoryDescription' => 'MedicalCondition',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            8 => 
            array (
                'LookUpMasterID' => 'E86551FD-0BF9-4F8A-8F5C-84965837474E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'PaymentMode',
                'ItemCategoryDescription' => 'PaymentMode',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => NULL,
            ),
            9 => 
            array (
                'LookUpMasterID' => '867F1AE2-E076-4695-BE2E-8926484689F3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'ReminderPeriod',
                'ItemCategoryDescription' => 'ReminderPeriod',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            10 => 
            array (
                'LookUpMasterID' => '55FBCB72-D244-4D89-9E89-8E214E962FED',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Medicine Notes',
                'ItemCategoryDescription' => 'Medicine Notes',
                'IsDeleted' => '0',
                'Importance' => '31',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2016-06-27 11:52:03.150',
            ),
            11 => 
            array (
                'LookUpMasterID' => '7006B34D-92AC-4D66-98C9-9413441956DB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'ExpenseOut',
                'ItemCategoryDescription' => 'Payment',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            12 => 
            array (
                'LookUpMasterID' => '287837A2-F9D5-4604-AB20-9A1E028EBA55',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Diagnosis',
                'ItemCategoryDescription' => 'Diagnosis',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            13 => 
            array (
                'LookUpMasterID' => 'C9D49F67-BCB8-400A-9DA4-9CC900AD7167',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Status',
                'ItemCategoryDescription' => 'Status',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            14 => 
            array (
                'LookUpMasterID' => '8611DB5E-CAC9-46E6-8DE1-9D92853BAB45',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Shade',
                'ItemCategoryDescription' => 'Shade',
                'IsDeleted' => '1',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            15 => 
            array (
                'LookUpMasterID' => 'C5D4570D-81D3-40B8-A61D-A9B5389502B0',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Occupation',
                'ItemCategoryDescription' => 'Occupation',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            16 => 
            array (
                'LookUpMasterID' => 'F1198015-8D41-43F2-B805-B2ADDBC5D253',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Observation',
                'ItemCategoryDescription' => 'Observation',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2014-06-21 10:18:04.710',
            ),
            17 => 
            array (
                'LookUpMasterID' => 'C7C09CED-9BE7-4482-AF42-B41F9E1E683F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Frequency',
                'ItemCategoryDescription' => 'Frequency',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            18 => 
            array (
                'LookUpMasterID' => 'B909F7A0-DFEA-4296-A115-B8772147DB58',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'TreatmentType',
                'ItemCategoryDescription' => 'TreatmentType',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            19 => 
            array (
                'LookUpMasterID' => '4DF65ED3-AA09-4D77-9E8B-B9B4DF4F7CC2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'DentalHistory',
                'ItemCategoryDescription' => 'DentalHistory',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            20 => 
            array (
                'LookUpMasterID' => '7E6079CB-DF4A-4DD7-8B02-C757B7F6405B',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'PatientPersonalAttributes',
                'ItemCategoryDescription' => 'PatientPersonalAttributes',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            21 => 
            array (
                'LookUpMasterID' => '6411E88A-ED21-4C82-AA08-C7AF1A9FCF7A',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Allergies',
                'ItemCategoryDescription' => 'Allergies',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            22 => 
            array (
                'LookUpMasterID' => '37B28F29-0E7C-452E-A760-C7FD8CD3F9E2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Title',
                'ItemCategoryDescription' => 'Title',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            23 => 
            array (
                'LookUpMasterID' => '8A2D2EC2-2612-4B57-A8F9-C82BEE12DDCC',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'TreatmentSpecialityType',
                'ItemCategoryDescription' => 'TreatmentSpecialityType',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            24 => 
            array (
                'LookUpMasterID' => '2E414952-CBFF-495D-B346-D5197F83E01F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'MaritalStatus',
                'ItemCategoryDescription' => 'MaritalStatus',
                'IsDeleted' => '0',
                'Importance' => '29',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2013-12-20 19:02:23.360',
            ),
            25 => 
            array (
                'LookUpMasterID' => '9D4D4288-A512-40B8-9BAC-D86F7086DAC8',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'ProcedureType',
                'ItemCategoryDescription' => 'ProcedureType',
                'IsDeleted' => '0',
                'Importance' => '28',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2014-09-03 13:10:43.727',
            ),
            26 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-EF827EF9B71D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'LabItemStage',
                'ItemCategoryDescription' => 'LabItemStage',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2013-12-20 19:02:23.360',
            ),
            27 => 
            array (
                'LookUpMasterID' => 'F85518FF-5C66-4D35-AB4B-F7774942123F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'MedicalHistory',
                'ItemCategoryDescription' => 'MedicalHistory',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            28 => 
            array (
                'LookUpMasterID' => 'F43D6E70-92C6-4D82-9404-FF826EF9B70D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'PersonalReminderStatus',
                'ItemCategoryDescription' => 'PersonalReminderStatus',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            29 => 
            array (
                'LookUpMasterID' => '863D6E70-92C6-4D82-7404-FF826EF9B71D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'LabWorkComponent',
                'ItemCategoryDescription' => 'LabWorkComponent',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2013-12-20 19:02:23.360',
            ),
            30 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-FF826EF9B71D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'InvestigationsAdvisedList',
                'ItemCategoryDescription' => 'InvestigationsAdvisedList',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            31 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-FF827EF9B71D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'LabItemSent',
                'ItemCategoryDescription' => 'LabItemSent',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2013-12-20 19:02:23.360',
            ),
            32 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-FF827EF9B71E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Nationality',
                'ItemCategoryDescription' => 'Nationality',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            33 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-FF827EF9B71F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'PatientMedicalHistoryAttributes',
                'ItemCategoryDescription' => 'PatientMedicalHistoryAttributes',
                'IsDeleted' => '0',
                'Importance' => '0',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2012-09-24 19:02:23.360',
            ),
            34 => 
            array (
                'LookUpMasterID' => '243D6E70-92C6-4D82-9404-FF827EF9B78E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ItemCategory' => 'Duration',
                'ItemCategoryDescription' => 'Duration',
                'IsDeleted' => '0',
                'Importance' => '2',
                'LastUpdatedBy' => 'ADMIN',
                'LastUpdatedOn' => '2013-12-20 19:02:23.360',
            ),
        ));
        
        
    }
}