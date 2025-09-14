<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicAttributesDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClinicAttributesData')->delete();
        
        \DB::table('ClinicAttributesData')->insert(array (
            0 => 
            array (
                'ClinicAttributeDataID' => '2180FC41-6891-47EB-9A7E-015C7CBC85E7',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CLINICCULTURE',
                'AttributeValue' => 'en-IN',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-11-19 09:59:23.900',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            1 => 
            array (
                'ClinicAttributeDataID' => 'AED4FC0A-7048-4B17-AD80-01C3F8470576',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CHEQUELEDGER',
                'AttributeValue' => 'ICICI001',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            2 => 
            array (
                'ClinicAttributeDataID' => '6FC3388C-0BA5-49EB-820D-0458AB164F55',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'DefaultPatientCodeSuffix',
                'AttributeValue' => '-2024',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 22:54:18.903',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 22:54:18.903',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            3 => 
            array (
                'ClinicAttributeDataID' => '0DF860B8-1666-41BC-84F5-07087F194B26',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'ISTREATMENTCOSTFIXED',
                'AttributeValue' => '0',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-10-14 14:49:45.697',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2023-02-28 11:48:05.630',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            4 => 
            array (
                'ClinicAttributeDataID' => '69E33928-A994-43BB-889B-08DA4955E9D3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'GOOGLELINK',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-05 19:12:29.197',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-05 19:12:29.197',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => 'D84016D8-408E-42FF-AFE2-722473812C19',
            ),
            5 => 
            array (
                'ClinicAttributeDataID' => '2F3CECD6-C49E-4BB7-9570-13D4C9CE37EF',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'EMAILHOSTSERVER',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-01 15:40:16.713',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-01 15:40:16.713',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '68E99644-0D1A-43BA-A367-AEE43DAF9B4E',
            ),
            6 => 
            array (
                'ClinicAttributeDataID' => 'DCA71D2D-A5F3-4B4E-B0BF-1D85EF90E17F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'EMAILPASSWORD',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-01 15:40:16.713',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-01 15:40:16.713',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '68D3DA9E-DCB4-49FC-8B1C-06A4DC7585D0',
            ),
            7 => 
            array (
                'ClinicAttributeDataID' => 'B9CC4AA9-F4DB-4C9B-AEA2-2B2FC938EE3C',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'SSCUSTOMSETTING',
                'AttributeValue' => '1',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            8 => 
            array (
                'ClinicAttributeDataID' => '3915F4CF-CF9F-4F2D-BA1B-3CB4766E4A57',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'TWITTERLINK',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-05 19:12:29.197',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-05 19:12:29.197',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '074E3FFE-53AC-42A2-A51E-B2B770F024FA',
            ),
            9 => 
            array (
                'ClinicAttributeDataID' => 'C1CE1A55-4575-4D7F-B99D-456A264F4D86',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'LINKEDINLINK',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-05 19:12:29.197',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-05 19:12:29.197',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => 'EB2D3193-0776-4FA9-85A3-039AD2656431',
            ),
            10 => 
            array (
                'ClinicAttributeDataID' => 'F15CE044-664F-4A78-8733-45CC207496FE',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'AUTOINVOICE',
                'AttributeValue' => '1',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2020-07-29 11:15:54.860',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            11 => 
            array (
                'ClinicAttributeDataID' => 'C2DA6B2C-DAD8-41DB-9828-4BA9ECF6A9CB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'FACEBOOKLINK',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-05 19:12:29.197',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-05 19:12:29.197',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '38445341-415F-45D6-8406-D59EB026A889',
            ),
            12 => 
            array (
                'ClinicAttributeDataID' => 'B995643D-02C0-41A9-8DFE-5842F1109C20',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'MAXSEARCHRESULTS',
                'AttributeValue' => '50',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            13 => 
            array (
                'ClinicAttributeDataID' => 'B7899FE0-967C-4324-A207-608C1D1B77E1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CREDITLEDGER',
                'AttributeValue' => 'MICR001',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            14 => 
            array (
                'ClinicAttributeDataID' => '4DB5BA6A-2C48-4CC6-A080-627252B671AE',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CURRENCYSYMBOLDISP',
                'AttributeValue' => '1',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-06-21 10:26:17.990',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-06-21 10:27:39.257',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            15 => 
            array (
                'ClinicAttributeDataID' => '057F8821-28F5-439E-8423-6351807C7A4B',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CURRENCYDECIMAL',
                'AttributeValue' => '2',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-06-21 10:26:17.990',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-19 09:59:32.183',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            16 => 
            array (
                'ClinicAttributeDataID' => '21307527-B99E-4920-86EB-640B3670828D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'EMAILPORT',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-01 15:40:16.713',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-01 15:40:16.713',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '687E6291-17E7-44B3-BE4F-4B79D7C9A533',
            ),
            17 => 
            array (
                'ClinicAttributeDataID' => '7B16E43E-90E2-4202-8D56-674217665E58',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'NBRDOCTORSSLOTS',
                'AttributeValue' => '3',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            18 => 
            array (
                'ClinicAttributeDataID' => 'B4C146DB-1AD9-4738-BB73-6D980AC7905B',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'InvoiceStartValue',
                'AttributeValue' => '100001',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2020-05-05 19:33:17.197',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            19 => 
            array (
                'ClinicAttributeDataID' => '128BE58E-884F-4CAC-8D87-77925F6410CB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'STARTTIME',
                'AttributeValue' => '08:30',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-06-22 19:56:54.207',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            20 => 
            array (
                'ClinicAttributeDataID' => '59DDF84B-3F24-44B7-94F3-7FFB1EAD1ECE',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CASHLEDGER',
                'AttributeValue' => 'ECGP',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            21 => 
            array (
                'ClinicAttributeDataID' => '0558BD2F-54DA-409C-BEEA-8DC9F1CB64E1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'ReceiptStartValue',
                'AttributeValue' => '100001',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2020-05-09 11:08:42.900',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            22 => 
            array (
                'ClinicAttributeDataID' => '6D728E95-67FC-42FC-8DDF-9B4F0FFF803D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'ISRECORDEDIT',
                'AttributeValue' => '0',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2020-07-29 11:06:52.717',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            23 => 
            array (
                'ClinicAttributeDataID' => '9F2A4CC6-F022-45CB-89D7-A8E60E934118',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'MINLETTERSREQDFORSEARCH',
                'AttributeValue' => '3',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            24 => 
            array (
                'ClinicAttributeDataID' => 'B0CB6720-079C-4593-B948-B3854965C7C5',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'TREATMENTSTEPSSETTING',
                'AttributeValue' => '1',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-11-11 17:06:04.120',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            25 => 
            array (
                'ClinicAttributeDataID' => 'BD05A26D-0990-4EEE-822F-B4BC9B2D6712',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'INSTAGRAMLINK',
                'AttributeValue' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-05 19:12:29.197',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2020-05-05 19:12:29.197',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '1D2B4F4D-E560-4AED-834D-0CD5857E339E',
            ),
            26 => 
            array (
                'ClinicAttributeDataID' => 'C7AF73B3-7F6A-4D4D-8B24-C1074DC9F29E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'DefaultPatientCodePrefix',
                'AttributeValue' => 'P',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2020-05-05 19:33:29.440',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            27 => 
            array (
                'ClinicAttributeDataID' => '343CD7A8-C8E8-4710-89D9-C68AF251BD51',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'ISDEFAULTPRINT',
                'AttributeValue' => '1',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-06-22 16:57:56.317',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            28 => 
            array (
                'ClinicAttributeDataID' => '434F3576-3123-4C7D-A8B1-D129CBFDA45E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'SLOTINTERVAL',
                'AttributeValue' => '15',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-06-16 17:26:30.780',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            29 => 
            array (
                'ClinicAttributeDataID' => '4386180A-C1EB-44EC-B76F-E1D7731DEADE',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'CLINICTYPE',
                'AttributeValue' => '2',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-05-28 18:44:28.560',
                'LastUpdatedBy' => NULL,
                'rowguid' => NULL,
            ),
            30 => 
            array (
                'ClinicAttributeDataID' => '51421F1C-FE9C-46C2-B686-F1DB9D067713',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'ENDTIME',
                'AttributeValue' => '22:00',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-06-22 16:57:56.317',
                'LastUpdatedBy' => NULL,
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            31 => 
            array (
                'ClinicAttributeDataID' => '0A219F89-BAF7-44F5-AA98-FF140B15CE6C',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'AttributeName' => 'PatientCodeStartValue',
                'AttributeValue' => '32521097',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2024-03-27 09:24:05.023',
                'LastUpdatedBy' => 'Calendar',
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
        ));
        
        
    }
}