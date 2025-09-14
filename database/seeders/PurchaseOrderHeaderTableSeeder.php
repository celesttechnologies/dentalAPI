<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseOrderHeaderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PurchaseOrderHeader')->delete();
        
        \DB::table('PurchaseOrderHeader')->insert(array (
            0 => 
            array (
                'PurchaseOrderHeaderId' => '15ED665E-FD4A-4596-859B-2F2D5C6C69BF',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PurchaseOrderNo' => '1',
                'PurchaseOrderDate' => '2020-08-04 00:00:00.000',
                'ItemSupplierID' => '7008156A-F2B8-4366-8067-2F13E0E9C868',
                'InvoiceNo' => '123',
                'InvoiceDate' => '2020-08-04 00:00:00.000',
                'Naration' => 'by k',
                'ArrivalDate' => NULL,
                'Total' => '14600.0000',
                'Tax' => '.0000',
                'OtherExp' => '.0000',
                'Discount' => '.0000',
                'GrandTotal' => '14600.0000',
                'PaidAmt' => '.0000',
                'BalanceAmt' => '14600.0000',
                'IsDeleted' => '0',
                'CreateBy' => 'administrator@ecgplus.com',
                'CreateOn' => '2020-08-04 14:51:43.597',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => '2020-08-04 14:51:43.597',
                'LessAmt' => '.0000',
                'rowguid' => '80D909CF-FD84-4CFC-B775-48E3B090A129',
            ),
        ));
        
        
    }
}