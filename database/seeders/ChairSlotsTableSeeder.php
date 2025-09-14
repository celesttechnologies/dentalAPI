<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChairSlotsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ChairSlots')->delete();
        
        \DB::table('ChairSlots')->insert(array (
            0 => 
            array (
                'ChairSlotID' => '2CCF3838-F664-41AB-BEC9-1359777231A4',
                'ChairID' => '251475D1-1492-477B-803F-ABBC93A07D6A',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2020-07-28 17:34:11.440',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:10.803',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            1 => 
            array (
                'ChairSlotID' => '11FF67BE-B81D-433E-A22F-59FB039D2A3F',
                'ChairID' => 'A1897705-F26A-4C17-8CEB-7FDA5A349DC2',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2014-11-11 09:32:43.327',
                'CreatedBy' => 'reception',
                'LastUpdatedOn' => '2020-08-05 11:02:52.157',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            2 => 
            array (
                'ChairSlotID' => 'CC5F6BEB-5AA6-4914-A54C-8596BBF4B63A',
                'ChairID' => '2DFECED7-4540-4134-B4B8-9B477CD7B018',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2020-07-28 17:31:36.437',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:29.300',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            3 => 
            array (
                'ChairSlotID' => 'D591C3C1-328A-49AB-A3E1-9B69BE9DDB3E',
                'ChairID' => '9AAA70EA-08AA-496E-85F7-7E3ED03A862C',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2020-07-28 17:33:25.510',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:19.393',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            4 => 
            array (
                'ChairSlotID' => '2036BE2B-0033-481E-A30A-C99074BD5A43',
                'ChairID' => 'E332C824-303F-40C5-A0A1-1784A911A4D3',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2020-07-28 17:34:37.910',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:02.480',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            5 => 
            array (
                'ChairSlotID' => '69F17EE0-E950-41EA-9996-CAD452266A8D',
                'ChairID' => 'DB532FB8-ADA1-4F3A-88E7-CE0149182493',
                'StartDatetime' => '2020-08-05 08:00:00.000',
                'EndDateTime' => '2020-08-05 21:30:00.000',
                'SlotInterval' => '0',
                'CreatedOn' => '2020-07-28 17:31:36.607',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:42.870',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
        ));
        
        
    }
}