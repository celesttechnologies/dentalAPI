<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseOrderDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PurchaseOrderDetail')->delete();
        
        \DB::table('PurchaseOrderDetail')->insert(array (
            0 => 
            array (
                'PurchaseOrderDetailId' => '7B08DAB1-31C3-4D08-9C37-69A8EEF33EAE',
                'PurchaseOrderHeaderId' => '15ED665E-FD4A-4596-859B-2F2D5C6C69BF',
                'ItemID' => 'F8DEF57E-8D5D-4E54-92C2-90E35D1C972F',
                'Qty' => '1',
                'Rate' => '14600.0000',
                'Amount' => '14600.0000',
                'ManufacturingDate' => NULL,
                'ExpiryDate' => NULL,
                'BatchNumber' => NULL,
                'BatchDate' => NULL,
            ),
        ));
        
        
    }
}