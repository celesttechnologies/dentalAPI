<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->truncate();
        $roles = [
            [
                'RoleID' => 'ECD75F1D-1232-4309-B8E9-A5293EC095CF',
                'name' => 'accounts',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'RoleID' => 'DDC35AB8-66B6-4331-9E37-60884973F680',
                'name' => 'administrator',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'RoleID' => '5973E31F-A329-4E2D-8541-C98D1E22CF81',
                'name' => 'doctor',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'RoleID' => '0D077E0C-A23D-40CB-A055-E2A8C278ABB2',
                'name' => 'labstaff',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'RoleID' => '7C7D137C-8327-4D70-9812-042AF4CDA291',
                'name' => 'staff',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'RoleID' => '86B48A1B-6E60-4A20-A20C-C66F7029953D',
                'name' => 'stockkeeper',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}