<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Clients')->delete();
        
        \DB::table('Clients')->insert(array (
            0 => 
            array (
                'ClientID' => '88337A44-357C-4339-9D1F-C3E085D8AB64',
                'ClientName' => 'Dental Clinic',
                'Address1' => '.',
                'City' => '',
                'State' => '',
                'CountryID' => '166',
                'CreatedOn' => '2014-05-28 18:44:28.560',
                'CreatedBy' => 'SYSTEM',
                'Address2' => NULL,
                'Description' => NULL,
                'Email' => NULL,
                'Fax' => NULL,
                'FinalDescription' => NULL,
                'IsDeleted' => NULL,
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
                'NoOfClinics' => NULL,
                'Phone' => NULL,
                'Revenue' => NULL,
                'rowguid' => 'D358FF54-CC0D-4858-B290-2CAA408AB895',
            ),
        ));
        
        
    }
}