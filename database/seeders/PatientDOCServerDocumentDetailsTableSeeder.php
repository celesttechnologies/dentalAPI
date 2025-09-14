<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientDOCServerDocumentDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientDOC_ServerDocumentDetails')->delete();
        
        \DB::table('PatientDOC_ServerDocumentDetails')->insert(array (
            0 => 
            array (
                'Id' => '1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PartitionID' => '1',
                'Title' => 'Patient Document',
                'Description' => 'Patient Document',
                'FolderPath' => 'eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/ECGPLUS/',
                'AbsolutePath' => 'D:\\Applications\\eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/ECGPLUS/',
                'IsDeleted' => '0',
                'CreatedBy' => 'administrator',
                'CreatedOn' => '2009-03-25 17:02:25.000',
                'Owner' => 'sushil',
                'LastUpdatedBy' => 'administrator',
                'LastUpdatedOn' => '2009-03-25 17:02:25.000',
                'RowGuid' => '78A48C21-5754-4641-8569-0F9074FBD6F6',
            ),
            1 => 
            array (
                'Id' => '2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PartitionID' => '2',
                'Title' => 'Deleted',
                'Description' => 'Deleted',
                'FolderPath' => 'eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/Deleted/',
                'AbsolutePath' => 'D:\\Applications\\eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/Deleted/',
                'IsDeleted' => '1',
                'CreatedBy' => 'administrator',
                'CreatedOn' => '2009-03-26 15:51:46.000',
                'Owner' => 'sushil',
                'LastUpdatedBy' => 'administrator',
                'LastUpdatedOn' => '2009-03-26 15:51:46.000',
                'RowGuid' => '0D67D75A-6905-470E-A722-49C85E18B7F1',
            ),
            2 => 
            array (
                'Id' => '3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'PartitionID' => '3',
                'Title' => 'Backup',
                'Description' => 'Backup',
                'FolderPath' => 'eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/Backup/',
                'AbsolutePath' => 'D:\\Applications\\eclinicalguidancedocuments\\ECG7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2/Backup/',
                'IsDeleted' => '0',
                'CreatedBy' => 'administrator',
                'CreatedOn' => '2009-09-18 14:13:41.417',
                'Owner' => NULL,
                'LastUpdatedBy' => 'administrator',
                'LastUpdatedOn' => '2009-09-18 14:13:41.417',
                'RowGuid' => '4225FE52-659C-4769-89C2-807A05C33F4D',
            ),
        ));
        
        
    }
}