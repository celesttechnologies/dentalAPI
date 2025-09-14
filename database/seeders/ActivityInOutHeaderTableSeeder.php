<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivityInOutHeaderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ActivityInOutHeader')->delete();
        
        \DB::table('ActivityInOutHeader')->insert(array (
            0 => 
            array (
                'ActivityHeaderId' => '1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ActivityNumber' => '1',
                'NoOfItems' => '1',
                'Quantity' => '1',
                'Amount' => '14600.0000',
                'ActivityType' => 'Activity In',
                'ActivityDate' => '2020-08-04 00:00:00.000',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-08-04 14:51:43.597',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-04 14:53:36.170',
                'Comments' => 'new',
                'IsDeleted' => '0',
                'rowguid' => '9E3D2BBC-5A86-4C48-BD3D-27A42D243F33',
                'PurchaseOrderHeaderId' => '15ED665E-FD4A-4596-859B-2F2D5C6C69BF',
            ),
            1 => 
            array (
                'ActivityHeaderId' => '2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ActivityNumber' => '1',
                'NoOfItems' => '1',
                'Quantity' => '1',
                'Amount' => '14600.0000',
                'ActivityType' => 'Activity OUT',
                'ActivityDate' => '2020-08-04 14:48:54.020',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-08-04 14:53:10.953',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-04 14:53:10.953',
                'Comments' => 'for 101',
                'IsDeleted' => '0',
                'rowguid' => 'BC1565DD-4BCF-4D8B-9B1F-05E5A87F245E',
                'PurchaseOrderHeaderId' => NULL,
            ),
        ));
        
        
    }
}