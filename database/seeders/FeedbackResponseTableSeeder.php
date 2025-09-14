<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackResponseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('FeedbackResponse')->delete();
        
        \DB::table('FeedbackResponse')->insert(array (
            0 => 
            array (
                'FeedbackID' => '1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'ProviderID' => '37A8CCBF-024D-4FA9-B5C4-963A11ACC3CE',
                'PatientName' => 'Sushil Kumar Test',
                'MobileNumber' => '9892284502',
                'DateOfFeedBack' => '2024-04-03 17:48:48.047',
                'IsDeleted' => 'N',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 17:48:48.047',
                'UpdatedBy' => '',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
                'Status' => '0',
            ),
            1 => 
            array (
                'FeedbackID' => '2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'ProviderID' => '37A8CCBF-024D-4FA9-B5C4-963A11ACC3CE',
                'PatientName' => 'Sushil Kumar Test',
                'MobileNumber' => '9892284502',
                'DateOfFeedBack' => '2024-04-03 18:04:19.730',
                'IsDeleted' => 'N',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 18:04:19.730',
                'UpdatedBy' => '',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
                'Status' => '0',
            ),
            2 => 
            array (
                'FeedbackID' => '1002',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'ProviderID' => 'B40C7DB6-B50F-4776-9FA9-F4146B38DC58',
                'PatientName' => 'Sushil Kumar Test',
                'MobileNumber' => '9892284502',
                'DateOfFeedBack' => '2024-04-20 13:47:23.853',
                'IsDeleted' => 'N',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 13:47:23.853',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 13:47:23.853',
                'Status' => '0',
            ),
            3 => 
            array (
                'FeedbackID' => '2002',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'ProviderID' => '37A8CCBF-024D-4FA9-B5C4-963A11ACC3CE',
                'PatientName' => 'Sushil Kumar Test',
                'MobileNumber' => '9892284502',
                'DateOfFeedBack' => '2024-05-20 10:57:15.590',
                'IsDeleted' => 'N',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 10:57:15.590',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 10:57:15.590',
                'Status' => '0',
            ),
        ));
        
        
    }
}