<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CTSecuritiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('CT_Securities')->delete();
        
        \DB::table('CT_Securities')->insert(array (
            0 => 
            array (
                'SecurityID' => '1',
                'ObjectType' => 'FOLDER',
                'ObjectID' => '4',
                'ObjectDetails' => NULL,
                'UserObjectID' => 'naman',
                'UserObjectType' => NULL,
                'FullControl' => '1',
                'Write' => '1',
                'Modify' => '1',
                'ReadExecute' => '1',
                'ListContent' => '1',
                'ReadOnly' => '1',
                'SpecialPermissions' => '1',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:36:37.343',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => '2023-12-05 14:36:37.343',
            ),
            1 => 
            array (
                'SecurityID' => '2',
                'ObjectType' => 'FOLDER',
                'ObjectID' => '5',
                'ObjectDetails' => NULL,
                'UserObjectID' => 'naman',
                'UserObjectType' => NULL,
                'FullControl' => '1',
                'Write' => '1',
                'Modify' => '1',
                'ReadExecute' => '1',
                'ListContent' => '1',
                'ReadOnly' => '1',
                'SpecialPermissions' => '1',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:37:02.000',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => '2023-12-05 14:37:02.000',
            ),
            2 => 
            array (
                'SecurityID' => '3',
                'ObjectType' => 'FOLDER',
                'ObjectID' => '6',
                'ObjectDetails' => NULL,
                'UserObjectID' => 'naman',
                'UserObjectType' => NULL,
                'FullControl' => '1',
                'Write' => '1',
                'Modify' => '1',
                'ReadExecute' => '1',
                'ListContent' => '1',
                'ReadOnly' => '1',
                'SpecialPermissions' => '1',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:37:18.103',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => '2023-12-05 14:37:18.103',
            ),
        ));
        
        
    }
}