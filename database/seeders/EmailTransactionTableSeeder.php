<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailTransactionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('EmailTransaction')->delete();
        
        \DB::table('EmailTransaction')->insert(array (
            0 => 
            array (
                'EmailTransactionID' => '8F583483-1D9A-4689-A105-1AD95F82E7B6',
                'ClinicIID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => 'E0E5B8F7-37E5-4E05-A8E6-07925BA1D7D4',
                'EmailTypeID' => NULL,
                'EmailTo' => 'suvarnavk014@gmail.com',
                'EmailFrom' => 'sushil717@gmail.com',
                'EmailCC' => NULL,
                'EmailBcc' => NULL,
                'Subject' => 'Happy Birthday',
                'MessageText' => 'Dear Ms. suvarna vikas kolhe , Dental Clinic wishes many happy returns of the day. ',
                'EmailAttachmentsID' => NULL,
                'CreatedBy' => NULL,
                'CreatedOn' => '2020-10-09 18:16:38.893',
                'Status' => '0',
                'SentOn' => '2020-10-09 18:16:38.890',
                'IsDeleted' => '0',
                'EmailFromName' => 'Dental Clinic',
                'EmailToName' => 'Ms. suvarna vikas kolhe',
                'ScheduledOn' => NULL,
            ),
            1 => 
            array (
                'EmailTransactionID' => '69E2E668-721C-409D-AAC1-59456264678D',
                'ClinicIID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => '218AF5FF-B06F-4883-9D05-0188731FC971',
                'EmailTypeID' => NULL,
                'EmailTo' => 'vs84381@gmail.com',
                'EmailFrom' => 'sushil717@gmail.com',
                'EmailCC' => NULL,
                'EmailBcc' => NULL,
                'Subject' => 'Happy Birthday',
                'MessageText' => 'Dear Ms. Vaishali sunil  solanki , Dental Clinic wishes many happy returns of the day. ',
                'EmailAttachmentsID' => NULL,
                'CreatedBy' => NULL,
                'CreatedOn' => '2020-10-09 18:16:40.997',
                'Status' => '0',
                'SentOn' => '2020-10-09 18:16:40.997',
                'IsDeleted' => '0',
                'EmailFromName' => 'Dental Clinic',
                'EmailToName' => 'Ms. Vaishali sunil  solanki',
                'ScheduledOn' => NULL,
            ),
            2 => 
            array (
                'EmailTransactionID' => 'B83C55B9-CC6B-4518-8730-AF58DACBE851',
                'ClinicIID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => 'DE9CAF07-A557-4AFB-A902-3A8D14FCA1CD',
                'EmailTypeID' => NULL,
                'EmailTo' => 'mandarpandy@yahoo.co.in',
                'EmailFrom' => 'administrator@ecgplus.com',
                'EmailCC' => NULL,
                'EmailBcc' => NULL,
                'Subject' => 'OPG',
                'MessageText' => 'PFA',
                'EmailAttachmentsID' => NULL,
                'CreatedBy' => 'karuna@drvorasdental.com',
                'CreatedOn' => '2022-07-06 16:35:06.123',
                'Status' => '1',
                'SentOn' => '2022-07-06 16:35:06.123',
                'IsDeleted' => '0',
                'EmailFromName' => 'Dental Clinic',
                'EmailToName' => 'MANISHA',
                'ScheduledOn' => NULL,
            ),
        ));
        
        
    }
}