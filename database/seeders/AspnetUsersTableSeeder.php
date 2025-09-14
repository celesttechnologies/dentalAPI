<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AspnetUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aspnet_Users')->delete();
        
        \DB::table('aspnet_Users')->insert(array (
            0 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'C159A5EA-2B4B-4C4B-A466-31BD8F53A30F',
                'UserName' => 'administrator@ecgplus.com',
                'LoweredUserName' => 'administrator@ecgplus.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-09-24 09:27:56.813',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => '88337A44-357C-4339-9D1F-C3E085D8AB64',
            ),
            1 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '43B8EB5C-CBCB-43B0-9E19-1FD513C26927',
                'UserName' => 'archana',
                'LoweredUserName' => 'archana',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-12-24 03:10:51.783',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            2 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '0F2430CC-E320-4E97-912A-4350006F0298',
                'UserName' => 'archana@drvorasdental.com',
                'LoweredUserName' => 'archana@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-12-24 03:08:24.810',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            3 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '8C8E6DC1-DCAF-4D56-B060-8739098CBC62',
                'UserName' => 'ashitosh@drvorasdental.com',
                'LoweredUserName' => 'ashitosh@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-07-01 11:23:01.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            4 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '294D65D1-F295-4DD0-AA09-4FCA38331F35',
                'UserName' => 'darshan',
                'LoweredUserName' => 'darshan',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-30 12:14:11.870',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            5 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '410F3414-D966-4755-AE26-F80B033C98F1',
                'UserName' => 'dolly@drvorasdental.com',
                'LoweredUserName' => 'dolly@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-31 10:29:04.273',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            6 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '21402E0D-BECF-4D18-8876-B4728CC29D92',
                'UserName' => 'drnamanvora@gmail.com',
                'LoweredUserName' => 'drnamanvora@gmail.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2023-12-15 04:44:26.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            7 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '9298EF98-359A-4237-A5EC-3416799AE08A',
                'UserName' => 'griva@drvorasdental.com',
                'LoweredUserName' => 'griva@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2021-11-19 13:36:08.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            8 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'F646C6DB-7DC2-49AE-AB8D-C10D9FEBC3CA',
                'UserName' => 'himanshu@drvorasdental.co',
                'LoweredUserName' => 'himanshu@drvorasdental.co',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2020-11-04 13:25:06.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            9 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '01544E5D-7207-4E78-BB99-595666249F08',
                'UserName' => 'implant@drvorasdental.com',
                'LoweredUserName' => 'implant@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-03-01 15:47:26.003',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            10 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '428048D1-4AB5-44F1-A25D-7925649D1FC0',
                'UserName' => 'Jinal@drvorasdental.com',
                'LoweredUserName' => 'jinal@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2023-03-22 11:04:45.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            11 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'DE07D84F-2320-4F78-9094-64219D722118',
                'UserName' => 'kajal@drvorasdental.com',
                'LoweredUserName' => 'kajal@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-22 03:36:33.977',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            12 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'F9D07A37-D66D-4452-BA5C-471B0BDB9801',
                'UserName' => 'karuna@drvorasdental.com',
                'LoweredUserName' => 'karuna@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-31 09:55:08.980',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            13 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'D70D65EE-E131-4FCB-894B-78E2F48922BD',
                'UserName' => 'Krisha@drvorasdental.com',
                'LoweredUserName' => 'krisha@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-12-25 08:13:14.113',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            14 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '1EDA261F-0655-449D-B1D8-61884C9A1F93',
                'UserName' => 'Kruti@drvorasdental.com',
                'LoweredUserName' => 'kruti@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2023-05-20 03:45:41.463',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            15 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'CCCDC013-4DBF-419A-AB22-4F479717D7AE',
                'UserName' => 'mahekgandhi@drvorasdental.com',
                'LoweredUserName' => 'mahekgandhi@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-09-24 05:29:16.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            16 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '9BE45C76-800B-4192-A62C-7948EBE7C384',
                'UserName' => 'manisha@drvorasdental.com',
                'LoweredUserName' => 'manisha@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-31 10:28:59.780',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            17 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '2DDBF61D-051E-4ABD-8694-086B26B386CD',
                'UserName' => 'maya',
                'LoweredUserName' => 'maya',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-04-15 05:32:55.497',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            18 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'BE271ED2-9CCA-43E4-9048-41D90DEE298E',
                'UserName' => 'minal@drvorasdental.com',
                'LoweredUserName' => 'minal@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2021-01-07 05:31:42.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            19 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '8C2A9FEB-7E3F-4FA8-A4BA-B38B73EA9DCF',
                'UserName' => 'mitali',
                'LoweredUserName' => 'mitali',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-29 14:10:37.803',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            20 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '116BE9C6-66F2-410A-B8F5-081F07F8472D',
                'UserName' => 'Mitali@drvorasdental.com',
                'LoweredUserName' => 'mitali@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-04-27 07:44:22.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            21 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '0F6496F1-5A20-4218-B6DE-A0EFC905ED5D',
                'UserName' => 'naman',
                'LoweredUserName' => 'naman',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-31 10:44:00.740',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            22 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '4D17916C-2B55-4F95-BF20-2C27EE993A28',
                'UserName' => 'nidhi',
                'LoweredUserName' => 'nidhi',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2021-06-30 14:22:27.067',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            23 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '74CCB3B7-2771-4740-9D20-20B95FF58C97',
                'UserName' => 'nouser@gmail.com',
                'LoweredUserName' => 'nouser@gmail.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-09-10 05:25:13.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            24 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '4B04A689-1831-4B4A-ABBC-43EFCBFCFBA0',
                'UserName' => 'pooja',
                'LoweredUserName' => 'pooja',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-27 15:31:02.203',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            25 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '0B1574C4-EC7E-4F9D-BA04-DC07ACFD0B8D',
                'UserName' => 'prem@drvorasdental.com',
                'LoweredUserName' => 'prem@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-07-01 11:18:03.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            26 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '00A0C810-D9E2-477C-A347-712AD2985526',
                'UserName' => 'Purvi@drvorasdental.com',
                'LoweredUserName' => 'purvi@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2022-08-12 05:06:41.447',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            27 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'E35B12B6-264D-4F03-A07B-FACF1D299D13',
                'UserName' => 'riya@drvorasdental.com',
                'LoweredUserName' => 'riya@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2021-11-16 07:51:33.007',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            28 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '1F34AA49-F9F2-4D78-A7AB-6BD5631C4AD9',
                'UserName' => 'Sachin@drvorasdental.com',
                'LoweredUserName' => 'sachin@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-10-11 10:18:54.057',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            29 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '08AF2416-EC7E-4801-9C48-912B1F2C38FC',
                'UserName' => 'Samdisha@drvorasdental.com',
                'LoweredUserName' => 'samdisha@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2022-12-12 06:24:04.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            30 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'F44E7818-1924-448E-B6B4-2CABB22323A2',
                'UserName' => 'seema@drvorasdental.com',
                'LoweredUserName' => 'seema@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-31 08:46:07.117',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            31 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '284AEBEC-EA88-4FED-8CEF-81B378347B73',
                'UserName' => 'sherin@drvorasdental.com',
                'LoweredUserName' => 'sherin@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2024-12-13 08:33:36.727',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            32 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '908A3B9A-A58A-409B-A6DA-604DB79B532E',
                'UserName' => 'shraddha',
                'LoweredUserName' => 'shraddha',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-22 12:22:39.500',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            33 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '6E7B86E0-ADF9-492C-99BB-570E4A92EDA9',
                'UserName' => 'Shreya@drvorasdental.com',
                'LoweredUserName' => 'shreya@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-23 03:38:43.220',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            34 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => 'DD3E2FFC-775F-47B3-9DA0-25A3E1B6EF50',
                'UserName' => 'siji@drvorasdental.com',
                'LoweredUserName' => 'siji@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-24 03:23:11.840',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            35 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '461FDA4D-468D-47A7-B6D9-B17E69D88720',
                'UserName' => 'upasana@drvorasdental.com',
                'LoweredUserName' => 'upasana@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2023-04-19 15:34:02.000',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            36 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '2ABBDC14-1018-46B8-B0CD-ED33F01CDB80',
                'UserName' => 'vishakha@drvorasdental.com',
                'LoweredUserName' => 'vishakha@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2025-01-24 15:53:52.510',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
            37 => 
            array (
                'ApplicationId' => 'FA9A4078-856D-4D51-AF17-8556921326D4',
                'UserId' => '91571313-9A84-4C89-87CE-F17AB9BC26E5',
                'UserName' => 'yashna@drvorasdental.com',
                'LoweredUserName' => 'yashna@drvorasdental.com',
                'MobileAlias' => NULL,
                'IsAnonymous' => '0',
                'LastActivityDate' => '2021-08-18 13:08:38.633',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ClientID' => NULL,
            ),
        ));
        
        
    }
}