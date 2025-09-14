<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientClinicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClientClinics')->delete();
        
        \DB::table('ClientClinics')->insert(array (
            0 => 
            array (
                'ClientClinicID' => 'B9BEFE6A-19EC-4289-9840-2913765530B1',
                'ClientID' => '88337A44-357C-4339-9D1F-C3E085D8AB64',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
            ),
        ));
        
        
    }
}