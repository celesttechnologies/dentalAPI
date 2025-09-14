<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AspnetSchemaVersionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aspnet_SchemaVersions')->delete();
        
        \DB::table('aspnet_SchemaVersions')->insert(array (
            0 => 
            array (
                'Feature' => 'common',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
            1 => 
            array (
                'Feature' => 'health monitoring',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
            2 => 
            array (
                'Feature' => 'membership',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
            3 => 
            array (
                'Feature' => 'personalization',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
            4 => 
            array (
                'Feature' => 'profile',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
            5 => 
            array (
                'Feature' => 'role manager',
                'CompatibleSchemaVersion' => '1',
                'IsCurrentVersion' => '1',
            ),
        ));
        
        
    }
}