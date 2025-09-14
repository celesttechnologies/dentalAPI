<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->truncate();
        // No permissions to seed from Aspnet, leaving empty or add default if needed
        // If you add permissions, use 'guard_name' => 'api'
    }
}