<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ItemType')->delete();
        
        \DB::table('ItemType')->insert(array (
            0 => 
            array (
                'ItemTypeID' => 'FEB19FA7-34E7-4AC7-A745-041399070274',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Root Canal',
                'Description' => 'Root Canal',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:32:50.610',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:32:50.610',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => 'FEB19FA7-34E7-4AC7-A745-041399070274',
            ),
            1 => 
            array (
                'ItemTypeID' => '6F18103B-41C6-45C1-90EA-05E40B804451',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'X-Ray',
                'Description' => 'X-Ray',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.420',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.420',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '0D40BEB0-1502-400F-86B1-EBCB3685BAB2',
            ),
            2 => 
            array (
                'ItemTypeID' => '5CD5B864-6F66-4A89-8D16-0774BD67BC14',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Post&Core',
                'Description' => 'Post&Core',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.453',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.453',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '5CD5B864-6F66-4A89-8D16-0774BD67BC14',
            ),
            3 => 
            array (
                'ItemTypeID' => '94B17BFE-70F3-4339-9883-15CE9B62C911',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Crowns & Veeners',
                'Description' => 'Crowns & Veeners',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.483',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.483',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '94B17BFE-70F3-4339-9883-15CE9B62C911',
            ),
            4 => 
            array (
                'ItemTypeID' => '1848F9BD-56C8-43C1-96E5-1CDCBCBA7A40',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Impression',
                'Description' => 'Impression',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.513',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.513',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '1848F9BD-56C8-43C1-96E5-1CDCBCBA7A40',
            ),
            5 => 
            array (
                'ItemTypeID' => '9FFC31E3-9C64-4EAB-AC9F-79B3D547A139',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Denture',
                'Description' => 'Denture',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.540',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.540',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '9FFC31E3-9C64-4EAB-AC9F-79B3D547A139',
            ),
            6 => 
            array (
                'ItemTypeID' => '9F8CC804-1BA2-4E09-9489-AB52B7A36503',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Teeth Whitening',
                'Description' => 'Teeth Whitening',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.570',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.570',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '9F8CC804-1BA2-4E09-9489-AB52B7A36503',
            ),
            7 => 
            array (
                'ItemTypeID' => '7364F85F-8253-45AD-9490-AF2C83BCD68F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Implant Crowns',
                'Description' => 'Implant Crowns',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.597',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.597',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '7B09FDB9-02D5-40FC-9BC2-6D313BE640DB',
            ),
            8 => 
            array (
                'ItemTypeID' => '2FCC7058-85E2-4374-872E-B5B84347A409',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'General Treatment',
                'Description' => 'General Treatment',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.623',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.623',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '2FCC7058-85E2-4374-872E-B5B84347A409',
            ),
            9 => 
            array (
                'ItemTypeID' => '2C985A48-2687-459F-8AC2-D1EAC0EB03AB',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Implant',
                'Description' => 'implant',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.650',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.650',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '2C985A48-2687-459F-8AC2-D1EAC0EB03AB',
            ),
            10 => 
            array (
                'ItemTypeID' => 'DA65ED76-5BEA-439C-9F85-E20F583DFDE4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Cavity Filling',
                'Description' => 'Cavity Filling',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.677',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.677',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => 'DA65ED76-5BEA-439C-9F85-E20F583DFDE4',
            ),
            11 => 
            array (
                'ItemTypeID' => 'C98F1949-00A8-4C1D-8B87-EB0CAAD08274',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Surgical',
                'Description' => 'Surgical',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.700',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.700',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => 'C98F1949-00A8-4C1D-8B87-EB0CAAD08274',
            ),
            12 => 
            array (
                'ItemTypeID' => '31FF7DD3-46C8-40CF-8D43-FEFD079C26B4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'Title' => 'Floride',
                'Description' => 'Floride',
                'ParentItemTypeID' => '00000000-0000-0000-0000-000000000000',
                'IsDeleted' => '0',
                'CreatedOn' => '2014-11-22 23:33:04.727',
                'CreatedBy' => 'SYSTEM',
                'LastUpdatedOn' => '2014-11-22 23:33:04.727',
                'LastUpdatedBy' => 'SYSTEM',
                'rowguid' => '31FF7DD3-46C8-40CF-8D43-FEFD079C26B4',
            ),
        ));
        
        
    }
}