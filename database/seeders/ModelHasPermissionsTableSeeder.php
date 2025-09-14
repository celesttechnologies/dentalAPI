<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('model_has_permissions')->truncate();
        // No model permissions to seed from Aspnet, leaving empty or add default if needed
    }
}