<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailSituationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('EmailSituations')->delete();
        
        \DB::table('EmailSituations')->insert(array (
            0 => 
            array (
                'EmailSituationID' => '32DD55AB-F03F-49B1-842E-3DF71FD16D45',
                'SitutationCode' => 'ESTU0003',
                'SituationDescription' => 'Lab Order',
                'DetailedTrigerringDeescription' => NULL,
                'SituationType' => '1',
                'DependentField1' => NULL,
                'DependentField2' => NULL,
                'DependentField3' => NULL,
                'DependentField4' => NULL,
                'IsActive' => 'True',
                'isDeleted' => '0',
                'CreatedOn' => NULL,
                'CreatedBy' => NULL,
                'LastUpdatedOn' => NULL,
                'LastUpdatedBy' => NULL,
            ),
            1 => 
            array (
                'EmailSituationID' => '32DD55AB-F03F-49B1-842E-3DF71FD16D92',
                'SitutationCode' => 'ESTU0002',
                'SituationDescription' => 'Referral Thank You',
                'DetailedTrigerringDeescription' => NULL,
                'SituationType' => '1',
                'DependentField1' => NULL,
                'DependentField2' => NULL,
                'DependentField3' => NULL,
                'DependentField4' => NULL,
                'IsActive' => 'True',
                'isDeleted' => '0',
                'CreatedOn' => NULL,
                'CreatedBy' => NULL,
                'LastUpdatedOn' => NULL,
                'LastUpdatedBy' => NULL,
            ),
            2 => 
            array (
                'EmailSituationID' => '95DD55AB-F03F-49B1-842E-3DF71FD16D92',
                'SitutationCode' => 'ESTU0001',
                'SituationDescription' => 'Birthday Greeting',
                'DetailedTrigerringDeescription' => NULL,
                'SituationType' => '1',
                'DependentField1' => NULL,
                'DependentField2' => NULL,
                'DependentField3' => NULL,
                'DependentField4' => NULL,
                'IsActive' => 'True',
                'isDeleted' => '0',
                'CreatedOn' => NULL,
                'CreatedBy' => NULL,
                'LastUpdatedOn' => NULL,
                'LastUpdatedBy' => NULL,
            ),
        ));
        
        
    }
}