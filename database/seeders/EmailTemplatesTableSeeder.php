<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('EmailTemplates')->delete();
        
        \DB::table('EmailTemplates')->insert(array (
            0 => 
            array (
                'EmailTemplateID' => '201C0C02-A2F1-47D0-99E1-0358EFF3AF22',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'SituationID' => '95DD55AB-F03F-49B1-842E-3DF71FD16D92',
                'EmailCategoryID' => '1',
                'FromEmailID' => 'sushil717@gmail.com',
                'BCCEmailID' => NULL,
                'SubjectEnglish' => 'Happy Birthday',
                'BodyEnglish' => 'Dear <<FIRSTNAME>> , <<CLINICNAME>> wishes many happy returns of the day. ',
                'EffectiveDate' => NULL,
                'IsDeleted' => '0',
                'CreatedOn' => NULL,
                'CreatedBy' => NULL,
                'LastUpdatedOn' => NULL,
                'LastUpdatedBy' => NULL,
            ),
            1 => 
            array (
                'EmailTemplateID' => '921C0C02-A2F1-47D0-99E1-0358EFF3AF22',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'SituationID' => '32DD55AB-F03F-49B1-842E-3DF71FD16D92',
                'EmailCategoryID' => '1',
                'FromEmailID' => 'sushil717@gmail.com',
                'BCCEmailID' => NULL,
                'SubjectEnglish' => 'Referral Thank-you',
                'BodyEnglish' => 'Dear <<REFERRARFULLNAME>> , Thank you for referring <<REFERREDPATIENTNAME>>, <<CLINICNAME>>.',
                'EffectiveDate' => '2014-01-14 19:05:14.317',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-01-14 19:05:14.317',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-01-14 19:05:14.317',
                'LastUpdatedBy' => NULL,
            ),
            2 => 
            array (
                'EmailTemplateID' => '325C0C02-A2F1-47D0-99E1-0358EFF3AF22',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'SituationID' => '32DD55AB-F03F-49B1-842E-3DF71FD16D45',
                'EmailCategoryID' => '1',
                'FromEmailID' => 'sushil717@gmail.com',
                'BCCEmailID' => NULL,
            'SubjectEnglish' => '[<<CLINICNAME>>] Confirmation of lab order (Order number: <<ORDER_NO>>)',
                'BodyEnglish' => 'Dear <<CONTACT_PERSON>>, 

Kindly go through the attachment which contains the confirmation details for lab-order.

Please let us know if you require any further information or assistance.

Thank you,
<<CLINIC_SIGNATURE>>
',
                'EffectiveDate' => '2014-01-14 19:05:14.317',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-01-14 19:05:14.317',
                'CreatedBy' => NULL,
                'LastUpdatedOn' => '2014-01-14 19:05:14.317',
                'LastUpdatedBy' => NULL,
            ),
        ));
        
        
    }
}