<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersClinicInfoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Users_ClinicInfo')->delete();
        
        \DB::table('Users_ClinicInfo')->insert(array (
            0 => 
            array (
                'UserID' => '2DDBF61D-051E-4ABD-8694-086B26B386CD',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '6F2DFC50-3DA3-4EF0-8D3F-5E5DF0E491BB',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-28 19:04:01.063',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-28 19:04:01.063',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            1 => 
            array (
                'UserID' => '6F31FEE6-BB7C-4C9B-ABA7-0CB005DB3256',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '52D3EB69-760D-4044-ADB0-19E983394C1D',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:08:46.420',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:08:46.420',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            2 => 
            array (
                'UserID' => 'C4E6F479-12E1-4530-95FE-1C7E94C34263',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '37A8CCBF-024D-4FA9-B5C4-963A11ACC3CE',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-01 22:22:17.323',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-05-01 22:22:17.323',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            3 => 
            array (
                'UserID' => '43B8EB5C-CBCB-43B0-9E19-1FD513C26927',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'B40C7DB6-B50F-4776-9FA9-F4146B38DC58',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 14:52:03.047',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 14:52:03.047',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            4 => 
            array (
                'UserID' => 'DD3E2FFC-775F-47B3-9DA0-25A3E1B6EF50',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'C4C6331F-6CE8-4748-B538-4EF7FAEBF72A',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-12-12 11:52:57.163',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2022-12-12 11:52:57.163',
                'LastUpdatedBy' => 'naman',
            ),
            5 => 
            array (
                'UserID' => '4D17916C-2B55-4F95-BF20-2C27EE993A28',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '030E42D3-2871-4123-BAFA-1131FE96BFDA',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:02:57.413',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:02:57.413',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            6 => 
            array (
                'UserID' => '14404B0A-E16E-48FA-ABF7-32FDC4AAB85F',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'A112B2C1-5EE3-426E-AEE4-73FF3033C264',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:12:01.103',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:12:01.103',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            7 => 
            array (
                'UserID' => '9298EF98-359A-4237-A5EC-3416799AE08A',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'F1909191-92A7-4F60-8EAF-298A53402F50',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-11-19 19:06:08.477',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-11-19 19:06:08.477',
                'LastUpdatedBy' => 'naman',
            ),
            8 => 
            array (
                'UserID' => 'BE271ED2-9CCA-43E4-9048-41D90DEE298E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '5328A427-56D3-4FD7-94DD-8A996FAF6F3D',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-01-07 11:01:42.257',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-01-07 11:01:42.257',
                'LastUpdatedBy' => 'naman',
            ),
            9 => 
            array (
                'UserID' => '4B04A689-1831-4B4A-ABBC-43EFCBFCFBA0',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'A32176FA-A2B2-4CF8-B2D6-CCB14570A076',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-28 19:12:38.087',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-28 19:12:38.087',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            10 => 
            array (
                'UserID' => 'F9D07A37-D66D-4452-BA5C-471B0BDB9801',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '9B54EE56-E8D1-4FFB-B779-4FFDDEE0D43D',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-09-28 18:55:00.980',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-09-28 18:55:00.980',
                'LastUpdatedBy' => 'naman',
            ),
            11 => 
            array (
                'UserID' => 'CCCDC013-4DBF-419A-AB22-4F479717D7AE',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '00D87968-6C1D-4406-B68B-0EA338B718CB',
                'IsDeleted' => '0',
                'CreatedOn' => '2024-09-24 10:59:16.167',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2024-09-24 10:59:16.167',
                'LastUpdatedBy' => 'naman',
            ),
            12 => 
            array (
                'UserID' => '294D65D1-F295-4DD0-AA09-4FCA38331F35',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'EB04F0A0-7FF4-4ED8-BD26-10EBD1649096',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 14:54:29.567',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 14:54:29.567',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            13 => 
            array (
                'UserID' => '6E7B86E0-ADF9-492C-99BB-570E4A92EDA9',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '9CF0B7C1-8CE6-4C9C-B1DF-2AEA33A3DAD6',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-10-09 16:01:01.190',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-10-09 16:01:01.190',
                'LastUpdatedBy' => 'naman',
            ),
            14 => 
            array (
                'UserID' => '908A3B9A-A58A-409B-A6DA-604DB79B532E',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '6FB3B965-00FD-4F36-949F-E647256485A1',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:06:53.210',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:06:53.210',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            15 => 
            array (
                'UserID' => 'DE07D84F-2320-4F78-9094-64219D722118',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '33DA5ED6-758B-4E6A-863D-EC1C11653AA8',
                'IsDeleted' => '0',
                'CreatedOn' => '2023-01-24 16:08:52.927',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2023-01-24 16:08:52.927',
                'LastUpdatedBy' => 'naman',
            ),
            16 => 
            array (
                'UserID' => '8D2F6373-A471-41DB-B594-673D2C42A9E4',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'A8E3F3A0-78E9-4EC1-9C49-E24E559EB8ED',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:04:43.053',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:04:43.053',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            17 => 
            array (
                'UserID' => '46272B6D-F533-4E6D-A689-69BD11CA4255',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '45B1A4B3-8A60-4CFF-9E3B-BFC4B5A62686',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:01:50.317',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:01:50.317',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            18 => 
            array (
                'UserID' => '6C42CB2C-6F20-403D-AB33-781251359839',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'F6E72F0C-23F2-435C-BBFC-FF612B24BEFD',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-30 15:10:21.813',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-30 15:10:21.813',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            19 => 
            array (
                'UserID' => '9BE45C76-800B-4192-A62C-7948EBE7C384',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '76014131-1B2D-468E-B9BE-62B98C765FA4',
                'IsDeleted' => '0',
                'CreatedOn' => '2021-09-28 18:54:06.700',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2021-09-28 18:54:06.700',
                'LastUpdatedBy' => 'naman',
            ),
            20 => 
            array (
                'UserID' => '284AEBEC-EA88-4FED-8CEF-81B378347B73',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '620F1EF9-EFFF-4424-B05E-2663A1576FA8',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-01-19 20:10:29.110',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2022-01-19 20:10:29.110',
                'LastUpdatedBy' => 'naman',
            ),
            21 => 
            array (
                'UserID' => '8C8E6DC1-DCAF-4D56-B060-8739098CBC62',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '82516AA4-6BE6-448B-B1C1-3FAAD1682F9B',
                'IsDeleted' => '0',
                'CreatedOn' => '2024-07-01 16:53:01.407',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2024-07-01 16:53:01.407',
                'LastUpdatedBy' => 'naman',
            ),
            22 => 
            array (
                'UserID' => '08AF2416-EC7E-4801-9C48-912B1F2C38FC',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '6EE16E30-15C0-4861-9257-522A4F09465C',
                'IsDeleted' => '0',
                'CreatedOn' => '2022-12-12 11:54:04.253',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2022-12-12 11:54:04.253',
                'LastUpdatedBy' => 'naman',
            ),
            23 => 
            array (
                'UserID' => '0F6496F1-5A20-4218-B6DE-A0EFC905ED5D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '61493F48-FAFB-47D9-8239-898C482E2E78',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-28 19:05:58.910',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-28 19:05:58.910',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            24 => 
            array (
                'UserID' => '67C8E444-1025-462B-9E3F-A6C05FD2B045',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '7114C352-143E-4159-9128-41FFCF012F2D',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-07-26 16:36:31.917',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-07-26 16:36:31.917',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            25 => 
            array (
                'UserID' => '461FDA4D-468D-47A7-B6D9-B17E69D88720',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'ADC75C15-E613-4C3C-B6C9-549413E46DDE',
                'IsDeleted' => '0',
                'CreatedOn' => '2023-04-19 21:04:02.600',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2023-04-19 21:04:02.600',
                'LastUpdatedBy' => 'naman',
            ),
            26 => 
            array (
                'UserID' => '8C2A9FEB-7E3F-4FA8-A4BA-B38B73EA9DCF',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '39AECAE8-74F1-4B5C-9575-0B4B59BA99B9',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-09-15 10:48:20.203',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-09-15 10:48:20.203',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            27 => 
            array (
                'UserID' => '21402E0D-BECF-4D18-8876-B4728CC29D92',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '777AB661-C6DB-4A67-80F4-26909FA2A03D',
                'IsDeleted' => '0',
                'CreatedOn' => '2023-12-15 10:14:26.540',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2023-12-15 10:14:26.540',
                'LastUpdatedBy' => 'naman',
            ),
            28 => 
            array (
                'UserID' => 'F646C6DB-7DC2-49AE-AB8D-C10D9FEBC3CA',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '982224E6-48A2-48CA-A150-2BB5FACB219A',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-11-04 18:55:06.087',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2020-11-04 18:55:06.087',
                'LastUpdatedBy' => 'naman',
            ),
            29 => 
            array (
                'UserID' => 'EC27F1B9-371D-46BE-A1F6-C58DCD8E1F65',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => 'E9BA26E6-B4B4-4B1A-AACB-293C31E7EBF8',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-05-01 22:21:08.363',
                'CreatedBy' => 'administrator@ecgplus.com',
                'LastUpdatedOn' => '2020-05-01 22:21:08.363',
                'LastUpdatedBy' => 'administrator@ecgplus.com',
            ),
            30 => 
            array (
                'UserID' => '0B1574C4-EC7E-4F9D-BA04-DC07ACFD0B8D',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '6767BE3E-9645-4F26-BDCB-BFE41E82F375',
                'IsDeleted' => '0',
                'CreatedOn' => '2024-07-01 16:48:03.963',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2024-07-01 16:48:03.963',
                'LastUpdatedBy' => 'naman',
            ),
            31 => 
            array (
                'UserID' => '2ABBDC14-1018-46B8-B0CD-ED33F01CDB80',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '24E61E36-F4C6-4B89-92A1-76FF3E9A501A',
                'IsDeleted' => '0',
                'CreatedOn' => '2024-03-15 20:51:50.960',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2024-03-15 20:51:50.960',
                'LastUpdatedBy' => 'naman',
            ),
            32 => 
            array (
                'UserID' => '91571313-9A84-4C89-87CE-F17AB9BC26E5',
                'ClinicID' => '7B13B11A-9A05-4E1D-A547-7E5A2F2B3FD2',
                'ProviderID' => '5CEF8EDF-3289-4A9D-BD8D-CC5DF92EF46C',
                'IsDeleted' => '0',
                'CreatedOn' => '2020-11-04 18:51:04.210',
                'CreatedBy' => 'naman',
                'LastUpdatedOn' => '2020-11-04 18:51:04.210',
                'LastUpdatedBy' => 'naman',
            ),
        ));
        
        
    }
}