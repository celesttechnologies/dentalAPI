<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicAttributesMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClinicAttributesMaster')->delete();
        
        \DB::table('ClinicAttributesMaster')->insert(array (
            0 => 
            array (
                'ClinicAttributeMasterID' => 'A19E4238-0AA5-4AB1-ABF6-05E93B27F8CD',
                'AttributeName' => 'SSCUSTOMSETTING',
                'AttributeDescription' => 'SS Custom Setting',
                'Importance' => '12',
                'CreatedOn' => '2013-02-12 18:20:23.943',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            1 => 
            array (
                'ClinicAttributeMasterID' => '8DB8A94D-F95F-425B-93BC-0B024BB81F5F',
                'AttributeName' => 'SLOTINTERVAL',
                'AttributeDescription' => 'Clinic Slot Inetrval',
                'Importance' => '3',
                'CreatedOn' => '2013-12-10 16:13:55.330',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            2 => 
            array (
                'ClinicAttributeMasterID' => '1DB9A94D-F95F-425B-93BC-0B024BB81F5F',
                'AttributeName' => 'ENDTIME',
                'AttributeDescription' => 'Clinic End-Time',
                'Importance' => '2',
                'CreatedOn' => '2013-12-10 16:13:55.330',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            3 => 
            array (
                'ClinicAttributeMasterID' => '1A68EE91-FA6D-4B19-92D0-0C00B18602EE',
                'AttributeName' => 'ISRECORDEDIT',
                'AttributeDescription' => 'ISRECORDEDIT',
                'Importance' => '16',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '65438073-C180-42B6-8A2C-B1B6990BE419',
            ),
            4 => 
            array (
                'ClinicAttributeMasterID' => 'DCE3A7C7-A537-4552-ACD7-13940B91966D',
                'AttributeName' => 'ReceiptStartValue',
                'AttributeDescription' => 'ReceiptStartValue',
                'Importance' => '21',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '54F8AEBD-8E73-4626-A2BA-9ECFD407CCEC',
            ),
            5 => 
            array (
                'ClinicAttributeMasterID' => 'BCD3B093-4FD3-4E13-8631-4049540984A5',
                'AttributeName' => 'CLINICTYPE',
                'AttributeDescription' => 'Clinic Type',
                'Importance' => '4',
                'CreatedOn' => '2012-07-08 00:00:00.000',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            6 => 
            array (
                'ClinicAttributeMasterID' => '1D86CE80-6D33-49AB-B8A8-41371D0CE91A',
                'AttributeName' => 'CURRENCYDECIMAL',
                'AttributeDescription' => 'Currency Decimal',
                'Importance' => '14',
                'CreatedOn' => '2014-06-21 10:18:04.707',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '7A492046-DE64-4E10-9BC7-707BB600BBB0',
            ),
            7 => 
            array (
                'ClinicAttributeMasterID' => 'E08C669A-A6B7-486C-ADF7-44C86959FF3B',
                'AttributeName' => 'InvoiceStartValue',
                'AttributeDescription' => 'InvoiceStartValue',
                'Importance' => '20',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => 'E7CC09D7-771E-4164-882C-09B99FE009A4',
            ),
            8 => 
            array (
                'ClinicAttributeMasterID' => '68352783-D3F5-41A8-B7EA-6A140434D15B',
                'AttributeName' => 'STARTTIME',
                'AttributeDescription' => 'Clinic Start-Time',
                'Importance' => '1',
                'CreatedOn' => '2013-12-10 16:13:46.427',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            9 => 
            array (
                'ClinicAttributeMasterID' => 'A770E3A8-2F97-4C84-BD2E-78093D3E7E3A',
                'AttributeName' => 'CREDITLEDGER',
                'AttributeDescription' => 'for tally interface Credit attibute to suffix',
                'Importance' => '10',
                'CreatedOn' => '2011-09-14 11:37:13.420',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            10 => 
            array (
                'ClinicAttributeMasterID' => 'D6FE53A2-AF98-49F5-9790-7F37B7D77BC1',
                'AttributeName' => 'ISDEFAULTPRINT',
                'AttributeDescription' => 'ISDEFAULTPRINT',
                'Importance' => '17',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '145699D2-64BA-4A6B-AB5A-C4F950B7BC30',
            ),
            11 => 
            array (
                'ClinicAttributeMasterID' => 'AD8CE6E0-C51B-47BB-A9D7-87818DC52494',
                'AttributeName' => 'DefaultPatientCodePrefix',
                'AttributeDescription' => 'DefaultPatientCodePrefix',
                'Importance' => '18',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '6D69178A-46D9-4A90-A7AA-02036087F000',
            ),
            12 => 
            array (
                'ClinicAttributeMasterID' => '4DBB17D2-8BB9-4295-8DC0-8D10C5A23BF2',
                'AttributeName' => 'LINKEDINLINK',
                'AttributeDescription' => 'LINKEDINLINK',
                'Importance' => '23',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '555C1EA7-9C46-4E27-983C-160ABF52B137',
            ),
            13 => 
            array (
                'ClinicAttributeMasterID' => 'B8D7FFD7-86DF-46CC-AB43-9236B51B9C09',
                'AttributeName' => 'CHEQUELEDGER',
                'AttributeDescription' => 'for tally interface Cash attibute to suffix',
                'Importance' => '9',
                'CreatedOn' => '2011-09-14 11:37:41.437',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            14 => 
            array (
                'ClinicAttributeMasterID' => '3B0C9BCA-3690-41D0-BAFC-9446BAC23003',
                'AttributeName' => 'NBRDOCTORSSLOTS',
                'AttributeDescription' => 'No of Doctors in appointment Skots',
                'Importance' => '8',
                'CreatedOn' => '2012-07-08 16:18:19.430',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            15 => 
            array (
                'ClinicAttributeMasterID' => '9294BB5C-5509-415B-9EA1-A56C18351D1B',
                'AttributeName' => 'INSTAGRAMLINK',
                'AttributeDescription' => 'INSTAGRAMLINK',
                'Importance' => '26',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => 'ABBFFD73-83DE-4025-AF20-850E29F6BB8E',
            ),
            16 => 
            array (
                'ClinicAttributeMasterID' => 'D4195F7F-1C1B-441B-9D30-AE9071E30D75',
                'AttributeName' => 'TWITTERLINK',
                'AttributeDescription' => 'TWITTERLINK',
                'Importance' => '25',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => 'B992C11C-892F-4160-84DE-548A5E407F65',
            ),
            17 => 
            array (
                'ClinicAttributeMasterID' => '612EFA6D-1F2A-437A-A774-AF2E0848955E',
                'AttributeName' => 'CURRENCYSYMBOLDISP',
                'AttributeDescription' => 'Currency Symbol Display',
                'Importance' => '15',
                'CreatedOn' => '2014-06-21 10:18:04.707',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '9BC6E7F1-2E27-4456-91DB-C1EC5D2C8449',
            ),
            18 => 
            array (
                'ClinicAttributeMasterID' => '0CB0DDC6-2061-4AB7-89DD-B2392EF41008',
                'AttributeName' => 'MAXSEARCHRESULTS',
                'AttributeDescription' => 'mx Search Results',
                'Importance' => '7',
                'CreatedOn' => '2012-07-08 16:04:35.343',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            19 => 
            array (
                'ClinicAttributeMasterID' => '0B205123-F8EB-41BB-A7F0-B5C982D2A28C',
                'AttributeName' => 'MINLETTERSREQDFORSEARCH',
                'AttributeDescription' => 'Min Letter Required for Search',
                'Importance' => '6',
                'CreatedOn' => '2012-07-08 16:04:09.120',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            20 => 
            array (
                'ClinicAttributeMasterID' => '08ACE867-BF01-48A9-B5E4-BC8EE234A625',
                'AttributeName' => 'CASHLEDGER',
                'AttributeDescription' => 'for tally interface Cash attibute to suffix',
                'Importance' => '11',
                'CreatedOn' => '2011-09-14 11:37:01.483',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            21 => 
            array (
                'ClinicAttributeMasterID' => '10394037-37FF-4D7A-9C9C-CE24993761E0',
                'AttributeName' => 'TREATMENTSTEPSSETTING',
                'AttributeDescription' => 'Treatment Step Setting',
                'Importance' => '5',
                'CreatedOn' => '2012-07-08 16:05:31.930',
                'CreatedBy' => NULL,
                'rowguid' => NULL,
            ),
            22 => 
            array (
                'ClinicAttributeMasterID' => '10394037-37FF-4D7A-9C9C-CE26993761E0',
                'AttributeName' => 'CLINICCULTURE',
                'AttributeDescription' => 'Clinic Culture ',
                'Importance' => '13',
                'CreatedOn' => '2014-03-13 18:17:34.940',
                'CreatedBy' => NULL,
                'rowguid' => 'AB59803A-E5A1-4B0A-BA12-461092BA2518',
            ),
            23 => 
            array (
                'ClinicAttributeMasterID' => '10394037-37FF-4D7A-9C9C-CE26993761E1',
                'AttributeName' => 'AUTOINVOICE',
                'AttributeDescription' => 'Auto Invoice',
                'Importance' => '14',
                'CreatedOn' => '2014-03-13 18:17:34.940',
                'CreatedBy' => NULL,
                'rowguid' => 'AB59803A-E5A1-4B0A-BA12-461092BA2519',
            ),
            24 => 
            array (
                'ClinicAttributeMasterID' => '49950604-E12B-4BDB-B435-CF09E9BA11AA',
                'AttributeName' => 'EMAILHOSTSERVER',
                'AttributeDescription' => 'Email Host Server ',
                'Importance' => '13',
                'CreatedOn' => '2014-03-13 18:17:34.940',
                'CreatedBy' => NULL,
                'rowguid' => 'AB59803A-E5A1-4B0A-BA12-461092BA2520',
            ),
            25 => 
            array (
                'ClinicAttributeMasterID' => '2849E6ED-0100-4A1B-83D2-D06B2AE0EA51',
                'AttributeName' => 'DefaultPatientCodeSuffix',
                'AttributeDescription' => 'DefaultPatientCodeSuffix',
                'Importance' => '30',
                'CreatedOn' => '2014-11-22 22:54:18.903',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '02218777-CF8F-45FC-B4B9-7EECCEB84F12',
            ),
            26 => 
            array (
                'ClinicAttributeMasterID' => '25DE69A7-6713-408B-B346-E12E90800D77',
                'AttributeName' => 'GOOGLELINK',
                'AttributeDescription' => 'GOOGLELINK',
                'Importance' => '24',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '8CE33A29-FE6B-402A-B9BB-84F821849141',
            ),
            27 => 
            array (
                'ClinicAttributeMasterID' => '4B830ACE-23AA-449B-9484-E4C5DC89B879',
                'AttributeName' => 'ISTREATMENTCOSTFIXED',
                'AttributeDescription' => 'Treatment Cost Fixed',
                'Importance' => '30',
                'CreatedOn' => '2022-10-14 14:46:18.787',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '87864919-0807-4AA3-A2E7-14E275091762',
            ),
            28 => 
            array (
                'ClinicAttributeMasterID' => '13597A17-6176-47A0-9CD0-E88B789710CE',
                'AttributeName' => 'FACEBOOKLINK',
                'AttributeDescription' => 'FACEBOOKLINK',
                'Importance' => '22',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => '8CD6BFBF-453D-4657-B010-E554DEC5F48C',
            ),
            29 => 
            array (
                'ClinicAttributeMasterID' => '32FFD989-1074-4508-A1D6-EBC4F53F5F2C',
                'AttributeName' => 'EMAILPASSWORD',
                'AttributeDescription' => 'Email Password',
                'Importance' => '13',
                'CreatedOn' => '2014-03-13 18:17:34.940',
                'CreatedBy' => NULL,
                'rowguid' => 'AB59803A-E5A1-4B0A-BA12-461092BA2521',
            ),
            30 => 
            array (
                'ClinicAttributeMasterID' => '211D49EF-2B7D-457B-8823-F6EDBE1ED5D8',
                'AttributeName' => 'PatientCodeStartValue',
                'AttributeDescription' => 'PatientCodeStartValue',
                'Importance' => '19',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'rowguid' => 'A00E2445-AD4B-4ED5-8780-5B2BEA990E25',
            ),
            31 => 
            array (
                'ClinicAttributeMasterID' => '76B29FBB-C532-4FB4-B096-F99020DB6341',
                'AttributeName' => 'EMAILPORT',
                'AttributeDescription' => 'Email Port',
                'Importance' => '13',
                'CreatedOn' => '2014-03-13 18:17:34.940',
                'CreatedBy' => NULL,
                'rowguid' => 'AB59803A-E5A1-4B0A-BA12-461092BA2522',
            ),
        ));
        
        
    }
}