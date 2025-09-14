<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AspnetRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aspnet_Roles')->delete();
        
        \DB::table('aspnet_Roles')->insert(array (
            0 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => 'ECD75F1D-1232-4309-B8E9-A5293EC095CF',
                'RoleName' => 'accounts',
                'LoweredRoleName' => 'accounts',
                'Description' => NULL,
            ),
            1 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => 'DDC35AB8-66B6-4331-9E37-60884973F680',
                'RoleName' => 'administrator',
                'LoweredRoleName' => 'administrator',
                'Description' => NULL,
            ),
            2 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => '5973E31F-A329-4E2D-8541-C98D1E22CF81',
                'RoleName' => 'doctor',
                'LoweredRoleName' => 'doctor',
                'Description' => NULL,
            ),
            3 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => '0D077E0C-A23D-40CB-A055-E2A8C278ABB2',
                'RoleName' => 'labstaff',
                'LoweredRoleName' => 'labstaff',
                'Description' => NULL,
            ),
            4 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => '7C7D137C-8327-4D70-9812-042AF4CDA291',
                'RoleName' => 'staff',
                'LoweredRoleName' => 'staff',
                'Description' => NULL,
            ),
            5 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'RoleId' => '86B48A1B-6E60-4A20-A20C-C66F7029953D',
                'RoleName' => 'stockkeeper',
                'LoweredRoleName' => 'stockkeeper',
                'Description' => NULL,
            ),
        ));
        
        
    }
}