<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivityInOutDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ActivityInOutDetail')->delete();
        
        \DB::table('ActivityInOutDetail')->insert(array (
            0 => 
            array (
                'ActivityDetailId' => '1',
                'ActivityHeaderId' => '1',
                'ItemId' => 'F8DEF57E-8D5D-4E54-92C2-90E35D1C972F',
                'Quantity' => '1',
                'Price' => '14600.0000',
            ),
            1 => 
            array (
                'ActivityDetailId' => '2',
                'ActivityHeaderId' => '2',
                'ItemId' => 'F8DEF57E-8D5D-4E54-92C2-90E35D1C972F',
                'Quantity' => '1',
                'Price' => '14600.0000',
            ),
        ));
        
        
    }
}