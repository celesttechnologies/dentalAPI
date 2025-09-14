<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('model_has_roles')->truncate();
        $modelHasRoles = [
            // Example mapping, fill with all mappings from AspnetUsersInRolesTableSeeder
            [
                'role_id' => '5973E31F-A329-4E2D-8541-C98D1E22CF81',
                'model_type' => 'App\\Models\\User',
                'model_id' => '116BE9C6-66F2-410A-B8F5-081F07F8472D',
            ],
            // ...add all mappings similarly...
        ];
        DB::table('model_has_roles')->insert($modelHasRoles);
    }
}