<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AspnetApplicationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aspnet_Applications')->delete();
        
        \DB::table('aspnet_Applications')->insert(array (
            0 => 
            array (
                'ApplicationName' => 'EClinicalGuidance',
                'LoweredApplicationName' => 'eclinicalguidance',
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'Description' => NULL,
            ),
        ));
        
        
    }
}