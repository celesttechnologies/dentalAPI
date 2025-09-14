<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemStockTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ItemStock')->delete();
        
        \DB::table('ItemStock')->insert(array (
            0 => 
            array (
                'ItemStockId' => '1',
                'ItemId' => 'F8DEF57E-8D5D-4E54-92C2-90E35D1C972F',
                'Quantity' => '0',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
            ),
        ));
        
        
    }
}