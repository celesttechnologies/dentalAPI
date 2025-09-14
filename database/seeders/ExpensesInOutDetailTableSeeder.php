<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpensesInOutDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ExpensesInOutDetail')->delete();
        
        \DB::table('ExpensesInOutDetail')->insert(array (
            0 => 
            array (
                'ExpensesDetailID' => 'A1E2F9CB-292A-41E4-BE4A-1FCA6E5DED00',
                'ExpensesHeaderID' => 'D22355B6-7FF9-4F59-B311-F8E30C824762',
                'ExpensesTypeID' => '52C1F974-E71B-454D-9DE1-FEE91CFAAAB2',
                'OtherExpenses' => 'Cash Received',
                'Amount' => '10000.00',
                'PaidBy' => 'cash',
            ),
            1 => 
            array (
                'ExpensesDetailID' => '2135A84B-07CD-4891-9788-31A9F6AE4690',
                'ExpensesHeaderID' => '6119AAF6-AC15-442E-A932-B145CC2C86DB',
                'ExpensesTypeID' => '007F487E-B4DA-4120-8919-D44E4B879ABA',
                'OtherExpenses' => 'Staff welfare expenses',
                'Amount' => '90.00',
                'PaidBy' => 'sachin',
            ),
            2 => 
            array (
                'ExpensesDetailID' => 'D42D5B04-98C7-4065-BC3A-44D10D1D52E7',
                'ExpensesHeaderID' => '337A284F-1386-42AD-8E8D-5684CBC80B20',
                'ExpensesTypeID' => '52C1F974-E71B-454D-9DE1-FEE91CFAAAB2',
                'OtherExpenses' => 'Cash Received',
                'Amount' => '1000.00',
                'PaidBy' => 'naman',
            ),
            3 => 
            array (
                'ExpensesDetailID' => '95389824-B7B9-455F-B369-5EECCE6EE7D0',
                'ExpensesHeaderID' => 'BD67545D-A4D1-485E-8C7A-F7A629BA2788',
                'ExpensesTypeID' => '007F487E-B4DA-4120-8919-D44E4B879ABA',
                'OtherExpenses' => 'Staff welfare expenses',
                'Amount' => '10.00',
                'PaidBy' => 'x',
            ),
            4 => 
            array (
                'ExpensesDetailID' => '06925564-E56F-4B0E-AB54-BFC456D4A49C',
                'ExpensesHeaderID' => 'F3A88B31-EE73-4955-BF5E-B62DAB9BB774',
                'ExpensesTypeID' => '007F487E-B4DA-4120-8919-D44E4B879ABA',
                'OtherExpenses' => 'Staff welfare expenses',
                'Amount' => '1500.00',
                'PaidBy' => 'sachin',
            ),
            5 => 
            array (
                'ExpensesDetailID' => '92D5B4C0-C3E0-436A-A905-F9D0C8BDD1C2',
                'ExpensesHeaderID' => '46AD4246-C23C-4564-8EE8-9B03366AF2AA',
                'ExpensesTypeID' => 'D4CF3809-0572-4EF8-AEC3-271C6D7B4F17',
                'OtherExpenses' => 'Conveyance expenses',
                'Amount' => '120.00',
                'PaidBy' => 'sanjay',
            ),
        ));
        
        
    }
}