<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientDOCFoldersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientDOC_Folders')->delete();
        
        \DB::table('PatientDOC_Folders')->insert(array (
            0 => 
            array (
                'FolderId' => '1',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Testimonials',
                'Description' => 'Testimonials',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2014-03-20 19:42:48.927',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-03-20 19:42:48.927',
                'FolderPath' => 'Testimonials',
                'PartitionId' => '1',
                'RowGuid' => 'DFA2F661-47CF-4C1F-B581-630097693564',
                'FolderType' => NULL,
                'Owner' => 'abhishek.k0023@gmail.com',
            ),
            1 => 
            array (
                'FolderId' => '2',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Scanned Image',
                'Description' => 'Scanned Image',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2014-03-20 19:42:48.927',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-03-20 19:42:48.927',
                'FolderPath' => 'Scanned Image',
                'PartitionId' => '1',
                'RowGuid' => '4FEA9D93-3CCB-47D8-A7D7-6A29D64D8E03',
                'FolderType' => NULL,
                'Owner' => 'abhishek.k0023@gmail.com',
            ),
            2 => 
            array (
                'FolderId' => '3',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Patient Reports',
                'Description' => 'Patient Reports',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2014-03-20 19:42:48.927',
                'LastUpdatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-03-20 19:42:48.927',
                'FolderPath' => 'Patient Reports',
                'PartitionId' => '1',
                'RowGuid' => '049E32DC-F881-4B02-AB62-EAFB09AC4E95',
                'FolderType' => NULL,
                'Owner' => 'abhishek.k0023@gmail.com',
            ),
            3 => 
            array (
                'FolderId' => '4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'TREATMENT PLAN',
                'Description' => 'TREATMENT PLAN',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:36:37.343',
                'LastUpdatedBy' => 'naman',
                'LastUpdatedOn' => '2023-12-05 14:36:37.343',
                'FolderPath' => 'TREATMENT PLAN',
                'PartitionId' => '1',
                'RowGuid' => '5EE9E988-9A62-4E5C-95FD-13DA9B3FBFC7',
                'FolderType' => NULL,
                'Owner' => 'naman',
            ),
            4 => 
            array (
                'FolderId' => '5',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'FINAL TREATMENT PLAN',
                'Description' => 'FINAL TREATMENT PLAN ',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:37:01.990',
                'LastUpdatedBy' => 'naman',
                'LastUpdatedOn' => '2023-12-05 14:37:01.990',
                'FolderPath' => 'FINAL TREATMENT PLAN',
                'PartitionId' => '1',
                'RowGuid' => 'C8D25952-3845-4968-A18B-C13A5916049C',
                'FolderType' => NULL,
                'Owner' => 'naman',
            ),
            5 => 
            array (
                'FolderId' => '6',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'CONSENT',
                'Description' => 'CONSENT',
                'ParentFolderId' => '0',
                'FolderTypeId' => NULL,
                'IsDeleted' => '0',
                'CreatedBy' => NULL,
                'CreatedOn' => '2023-12-05 14:37:18.103',
                'LastUpdatedBy' => 'naman',
                'LastUpdatedOn' => '2023-12-05 14:37:18.103',
                'FolderPath' => 'CONSENT',
                'PartitionId' => '1',
                'RowGuid' => 'DCC0D2A6-B9A5-4C00-8FCD-A3C7D59CCD46',
                'FolderType' => NULL,
                'Owner' => 'naman',
            ),
        ));
        
        
    }
}