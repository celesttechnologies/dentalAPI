<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSupplierTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ItemSupplier')->delete();
        
        \DB::table('ItemSupplier')->insert(array (
            0 => 
            array (
                'ItemSupplierID' => '7008156A-F2B8-4366-8067-2F13E0E9C868',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'SupplierName' => 'abc enterprise',
                'RegistrationNo' => '1234',
                'ContactPerson' => '',
                'Notes' => '',
                'Street1' => 'xyz',
                'Street2' => '',
                'City' => 'Mumbai',
                'State' => 'Maharashtra',
                'Country' => '102',
                'Postcode' => '400080',
                'ISD' => NULL,
                'STD' => NULL,
                'Phone' => '',
                'PermanentAddress' => 'nil',
                'AddedOn' => '2020-08-04 14:45:18.897',
                'AddedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-04 14:45:18.897',
                'LastUpdatedBy' => NULL,
                'DeletedOn' => '2020-08-04 14:45:18.897',
                'DeletedBy' => NULL,
                'IsActive' => '1',
                'rowguid' => '707A3125-47FA-48CD-8F9E-8BD575F325A2',
            ),
        ));
        
        
    }
}