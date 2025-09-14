<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicChairsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClinicChairs')->delete();
        
        \DB::table('ClinicChairs')->insert(array (
            0 => 
            array (
                'ChairID' => 'E332C824-303F-40C5-A0A1-1784A911A4D3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 6',
                'Description' => 'Air Motor',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:02.480',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:02.480',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
            1 => 
            array (
                'ChairID' => '9AAA70EA-08AA-496E-85F7-7E3ED03A862C',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 4',
                'Description' => 'NHV Cabin',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:19.393',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:19.393',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
            2 => 
            array (
                'ChairID' => 'A1897705-F26A-4C17-8CEB-7FDA5A349DC2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 1',
                'Description' => 'OPG cabin',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:52.157',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:52.157',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
            3 => 
            array (
                'ChairID' => '2DFECED7-4540-4134-B4B8-9B477CD7B018',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 3',
                'Description' => 'for old and handicapped',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:29.300',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:29.300',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
            4 => 
            array (
                'ChairID' => '251475D1-1492-477B-803F-ABBC93A07D6A',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 5',
                'Description' => 'Implant Cabin',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:10.803',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:10.803',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
            5 => 
            array (
                'ChairID' => 'DB532FB8-ADA1-4F3A-88E7-CE0149182493',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Chair 2',
                'Description' => 'blocked',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 11:02:42.870',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 11:02:42.870',
                'LastUpdatedBy' => 'administrator@ecgplus.com                                                                           ',
            ),
        ));
        
        
    }
}