<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpensesInOutHeaderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ExpensesInOutHeader')->delete();
        
        \DB::table('ExpensesInOutHeader')->insert(array (
            0 => 
            array (
                'ExpensesHeaderID' => '337A284F-1386-42AD-8E8D-5684CBC80B20',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Receipt                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '1000.00',
                'ExpenseDate' => '2020-07-31 00:00:00.000',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-31 08:39:40.033',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-31 14:51:19.103',
                'Comments' => 'naman ,..hdfc withdrawal',
                'IsDeleted' => '0',
                'rowguid' => 'C2202BFF-E560-460D-B699-493EFEE5BF4E',
            ),
            1 => 
            array (
                'ExpensesHeaderID' => '46AD4246-C23C-4564-8EE8-9B03366AF2AA',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Payments                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '120.00',
                'ExpenseDate' => '2020-07-31 14:47:53.127',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-31 14:52:58.057',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-31 15:07:26.803',
                'Comments' => 'market',
                'IsDeleted' => '1',
                'rowguid' => '98CF1F0C-725F-4DA7-ADF3-4E51CB1E187D',
            ),
            2 => 
            array (
                'ExpensesHeaderID' => '6119AAF6-AC15-442E-A932-B145CC2C86DB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Payments                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '90.00',
                'ExpenseDate' => '2020-07-30 00:00:00.000',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-30 18:42:42.050',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 18:44:45.540',
                'Comments' => 'butter 1 pack ',
                'IsDeleted' => '0',
                'rowguid' => '239DC492-917B-4CB1-A5AD-ED88985C11C2',
            ),
            3 => 
            array (
                'ExpensesHeaderID' => 'F3A88B31-EE73-4955-BF5E-B62DAB9BB774',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Payments                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '1500.00',
                'ExpenseDate' => '2020-07-31 08:40:10.573',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-31 08:40:40.960',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-31 08:40:40.960',
                'Comments' => 'sachin banana',
                'IsDeleted' => '0',
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
            4 => 
            array (
                'ExpensesHeaderID' => 'BD67545D-A4D1-485E-8C7A-F7A629BA2788',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Payments                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '10.00',
                'ExpenseDate' => '2020-07-31 14:53:55.750',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-31 14:57:58.043',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-31 15:06:26.080',
                'Comments' => 'biscuits',
                'IsDeleted' => '1',
                'rowguid' => 'ACE2D648-095A-497F-82C1-F412DB0292FF',
            ),
            5 => 
            array (
                'ExpensesHeaderID' => 'D22355B6-7FF9-4F59-B311-F8E30C824762',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ExpenseCategory' => 'Receipt                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ',
                'NoOfExpenseItems' => '1',
                'TotalAmount' => '10000.00',
                'ExpenseDate' => '2020-07-30 18:41:38.570',
                'CreatedBy' => 'administrator@ecgplus.com',
                'CreatedOn' => '2020-07-30 18:42:04.143',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 18:42:04.143',
                'Comments' => 'by nhv',
                'IsDeleted' => '0',
                'rowguid' => '00000000-0000-0000-0000-000000000000',
            ),
        ));
        
        
    }
}