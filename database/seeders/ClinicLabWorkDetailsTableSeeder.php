<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicLabWorkDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ClinicLabWorkDetails')->delete();
        
        \DB::table('ClinicLabWorkDetails')->insert(array (
            0 => 
            array (
                'LabWorkDetailID' => '5AE2AC7A-EF1F-4D11-A9E2-23C8D2D9FF2D',
                'LabWorkID' => 'CB340F6E-4A16-4D96-9D1C-61C415BF4A45',
                'LabWorkComponentID' => '4623361C-CED6-4A91-A35C-3CE01509E6A2',
                'SelectedTeeth' => 'RU6',
                'LabWorkComponentCost' => '5000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-04-01 14:40:12.577',
                'CreatedBy' => 'manisha@drvorasdental.com',
                'LastUpdatedOn' => '2021-04-01 14:40:20.740',
                'lastUpdatedBy' => 'manisha@drvorasdental.com',
            ),
            1 => 
            array (
                'LabWorkDetailID' => '17DC60BE-7910-4D94-89DE-2598A7243402',
                'LabWorkID' => 'CB340F6E-4A16-4D96-9D1C-61C415BF4A45',
                'LabWorkComponentID' => 'AD46C774-E425-4075-96B5-64B6BEAB9942',
                'SelectedTeeth' => 'RU6',
                'LabWorkComponentCost' => '1000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-04-01 14:40:12.577',
                'CreatedBy' => 'manisha@drvorasdental.com',
                'LastUpdatedOn' => '2021-04-01 14:40:20.740',
                'lastUpdatedBy' => 'manisha@drvorasdental.com',
            ),
            2 => 
            array (
                'LabWorkDetailID' => '269172E1-A74B-43FA-A8B3-303FE49DEBBC',
                'LabWorkID' => 'FC00489B-5C0A-4BC4-8423-01E6AB00D0BC',
                'LabWorkComponentID' => '39A40900-F624-433D-9197-197DBBA34256',
                'SelectedTeeth' => '',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-12-13 15:46:42.813',
                'CreatedBy' => 'seema@drvorasdental.com',
                'LastUpdatedOn' => '2021-12-15 12:10:26.190',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
            3 => 
            array (
                'LabWorkDetailID' => '56C686F1-6D40-47C5-BE8F-3236091A7C0D',
                'LabWorkID' => '2E129540-C8A5-4903-8B64-140C2C9F7A5A',
                'LabWorkComponentID' => 'D6D66868-A0C7-454C-8857-6175E1402A15',
                'SelectedTeeth' => 'LU5,LU6,LU7',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-07 09:23:37.223',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-09-28 11:03:18.137',
                'lastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            4 => 
            array (
                'LabWorkDetailID' => '04D954C5-2254-4F50-8E61-33B14EE90C0B',
                'LabWorkID' => '6512EBEC-32C7-4121-9EBB-D521F58F511C',
                'LabWorkComponentID' => '086EC576-0280-4ED9-BCDA-C71775F45413',
                'SelectedTeeth' => '',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-01-19 19:20:28.607',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2022-01-31 17:35:09.347',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
            5 => 
            array (
                'LabWorkDetailID' => '1FDE117D-90C0-4DA0-9926-3A25A9036039',
                'LabWorkID' => '5E29D3EB-0A4D-49FD-BACE-DCE64C8F35B7',
                'LabWorkComponentID' => '39A40900-F624-433D-9197-197DBBA34256',
                'SelectedTeeth' => '',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-02-03 20:58:15.540',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2022-02-05 11:39:05.400',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
            6 => 
            array (
                'LabWorkDetailID' => 'EA96DA76-DE46-4EC0-BCF7-448E76C12CA7',
                'LabWorkID' => 'D34280D9-9E3F-407B-B8A5-1F781747E462',
                'LabWorkComponentID' => '5D7176DD-E815-4364-9FB3-28D314FA2599',
                'SelectedTeeth' => 'RB1',
                'LabWorkComponentCost' => '2680.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-10-01 16:58:03.013',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2022-10-07 11:08:45.587',
                'lastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            7 => 
            array (
                'LabWorkDetailID' => '8EF001DF-6A5C-4BBB-9962-711DDF77EB6B',
                'LabWorkID' => '552DAD18-B80E-4903-8ABF-4CFE9B1DAD69',
                'LabWorkComponentID' => '4623361C-CED6-4A91-A35C-3CE01509E6A2',
                'SelectedTeeth' => 'LU6,RU6',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-10-21 16:27:21.387',
                'CreatedBy' => 'seema@drvorasdental.com',
                'LastUpdatedOn' => '2020-11-04 12:11:39.070',
                'lastUpdatedBy' => 'seema@drvorasdental.com',
            ),
            8 => 
            array (
                'LabWorkDetailID' => 'EE69E985-4C37-4C01-9B37-80A79FD2F90D',
                'LabWorkID' => '18D77DD1-6500-489D-A35F-FE3E172EFD8C',
                'LabWorkComponentID' => '87E3DE7B-5F46-4D01-8DF2-337F18C152F0',
                'SelectedTeeth' => 'LB7',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-11-24 16:51:57.683',
                'CreatedBy' => 'manisha@drvorasdental.com',
                'LastUpdatedOn' => '2021-12-01 15:43:48.177',
                'lastUpdatedBy' => 'manisha@drvorasdental.com',
            ),
            9 => 
            array (
                'LabWorkDetailID' => 'CF757F78-1050-4D62-83B5-83F73014F4AF',
                'LabWorkID' => '4B697D2C-2904-4982-9802-F0AB5849E204',
                'LabWorkComponentID' => 'AD46C774-E425-4075-96B5-64B6BEAB9942',
                'SelectedTeeth' => 'LU1',
                'LabWorkComponentCost' => '1000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-06 11:13:23.857',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-11-04 12:13:26.533',
                'lastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            10 => 
            array (
                'LabWorkDetailID' => '43AD69E2-0B3A-445F-A11F-94F724203775',
                'LabWorkID' => 'D7B57E6F-817A-463E-98C0-FCE3ADC8B440',
                'LabWorkComponentID' => 'AD46C774-E425-4075-96B5-64B6BEAB9942',
                'SelectedTeeth' => 'LU1',
                'LabWorkComponentCost' => '1000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 20:26:45.400',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-08-05 20:28:53.717',
                'lastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            11 => 
            array (
                'LabWorkDetailID' => 'CD9E06DF-D092-42F4-9B5C-AB02CAAEAD04',
                'LabWorkID' => '77270F12-90EC-4232-8F5D-4FC35DDB0538',
                'LabWorkComponentID' => 'FCE0C606-F638-4659-8086-827EBB3EB49B',
                'SelectedTeeth' => '',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-05-23 20:39:20.777',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2022-05-28 13:18:40.620',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
            12 => 
            array (
                'LabWorkDetailID' => '0689C964-7922-4CB2-A250-B064FD63DB3D',
                'LabWorkID' => '7C367AF7-5AD3-4C8F-8925-FC5D987E2AD2',
                'LabWorkComponentID' => '9B92B006-49EA-4013-9051-C1A569325CF3',
                'SelectedTeeth' => 'LU6,LB6',
                'LabWorkComponentCost' => '376000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-05-16 11:50:30.160',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-05-16 11:51:23.577',
                'lastUpdatedBy' => 'naman',
            ),
            13 => 
            array (
                'LabWorkDetailID' => 'CC01289D-4DE6-4593-9759-E2B6D9080AE3',
                'LabWorkID' => '280E3031-72DE-4B9A-BA07-00B2E352E398',
                'LabWorkComponentID' => 'AD46C774-E425-4075-96B5-64B6BEAB9942',
                'SelectedTeeth' => 'RB6',
                'LabWorkComponentCost' => '1000.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-08-05 10:39:02.510',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-09-28 11:02:33.723',
                'lastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            14 => 
            array (
                'LabWorkDetailID' => '7FB7138C-C9F2-4E45-B033-E62E2F4293BB',
                'LabWorkID' => 'E1A204B8-9310-466B-B621-E84319BCD723',
                'LabWorkComponentID' => '39A40900-F624-433D-9197-197DBBA34256',
                'SelectedTeeth' => '',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-03-07 19:46:07.880',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2022-03-08 17:38:13.273',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
            15 => 
            array (
                'LabWorkDetailID' => 'FC6A4263-504B-4E2B-A5E3-FA66F1B061AD',
                'LabWorkID' => '8793FA1B-48E8-4409-ABF8-9750BF3ED41A',
                'LabWorkComponentID' => 'BC8C86FF-B4B4-42DF-A104-D5AF3D10200D',
                'SelectedTeeth' => 'LU6',
                'LabWorkComponentCost' => '.00',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-10-21 19:03:14.733',
                'CreatedBy' => 'karuna@drvorasdental.com',
                'LastUpdatedOn' => '2021-10-21 19:03:14.733',
                'lastUpdatedBy' => 'karuna@drvorasdental.com',
            ),
        ));
        
        
    }
}