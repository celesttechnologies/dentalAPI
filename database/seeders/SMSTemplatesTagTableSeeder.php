<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SMSTemplatesTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('SMSTemplatesTag')->delete();
        
        \DB::table('SMSTemplatesTag')->insert(array (
            0 => 
            array (
                'SMSTemplatesTagID' => '11D126E8-8097-4412-8F07-12991F4C72A2',
                'SMSTagCode' => 'TAG006',
                'SMSTagDescription' => '<<APT_TO_TIME>>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
            1 => 
            array (
                'SMSTemplatesTagID' => 'A6F76439-9D5B-4A24-A98C-4B1BAA0EFB31',
                'SMSTagCode' => 'TAG002',
                'SMSTagDescription' => '<<LASTNAME>>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
            2 => 
            array (
                'SMSTemplatesTagID' => '2556F9B8-5FF7-45FF-9714-6800F0B0CFB2',
                'SMSTagCode' => 'TAG001',
                'SMSTagDescription' => '<<FIRSTNAME>>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
            3 => 
            array (
                'SMSTemplatesTagID' => '5DAFDE94-6CC0-469C-9165-94586E31D619',
                'SMSTagCode' => 'TAG004',
                'SMSTagDescription' => '<<PROVIDER>>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
            4 => 
            array (
                'SMSTemplatesTagID' => '394B5D13-ECA6-4141-A926-AF6796B53EC9',
                'SMSTagCode' => 'TAG003',
                'SMSTagDescription' => '<<CLINICNAME>>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
            5 => 
            array (
                'SMSTemplatesTagID' => 'B71BBB45-A9EE-4949-A789-B7FD5DE9C31D',
                'SMSTagCode' => 'TAG005',
                'SMSTagDescription' => '<<APT_FROM_TIME>',
                'DefaultValue' => NULL,
                'SMSTagQuery' => NULL,
                'IsDeleted' => '0',
            ),
        ));
        
        
    }
}