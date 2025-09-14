<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_has_permissions')->truncate();
        // No role permissions to seed from Aspnet, leaving empty or add default if needed
    }
}