<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientAllergyAttributeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('PatientAllergyAttribute')->delete();
        
        \DB::table('PatientAllergyAttribute')->insert(array (
            0 => 
            array (
                'PatientAllergyDetailID' => '5ACF5EF9-CF55-4298-866F-0B00A0A2C9D9',
                'PatientID' => 'AC705EBD-B5EB-4684-987E-A3B8F5BD782A',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'Amoxicillin allergy',
                'LastUpdatedBy' => 'ac705ebd-b5eb-4684-987e-a3b8f5bd782a',
                'LastUpdatedOn' => '2024-03-02 16:34:36.397',
            ),
            1 => 
            array (
                'PatientAllergyDetailID' => 'D5461FE9-39EB-4361-92D7-1318A5D87659',
                'PatientID' => '8484E7BC-C86C-498B-B516-446577D4F21F',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'SULPHA,TETRA,ASPIRIN',
                'LastUpdatedBy' => '8484e7bc-c86c-498b-b516-446577d4f21f',
                'LastUpdatedOn' => '2024-08-02 17:15:50.557',
            ),
            2 => 
            array (
                'PatientAllergyDetailID' => '4C7E5458-DCD2-47E4-AD2C-2755C84DEF8F',
                'PatientID' => '01B0C3E7-75C7-4E44-B2BF-5A4958C01B55',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '1',
                'AllergyAttributeText' => '',
                'LastUpdatedBy' => '01b0c3e7-75c7-4e44-b2bf-5a4958c01b55',
                'LastUpdatedOn' => '2023-11-18 13:25:20.027',
            ),
            3 => 
            array (
                'PatientAllergyDetailID' => 'EF57DB72-3C12-4388-93C6-4DC8FD0F03BF',
                'PatientID' => '6DAAF65F-D624-4C79-8AA4-913AD5E6D968',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '1',
                'AllergyAttributeText' => '',
                'LastUpdatedBy' => '6daaf65f-d624-4c79-8aa4-913ad5e6d968',
                'LastUpdatedOn' => '2020-08-01 19:02:29.360',
            ),
            4 => 
            array (
                'PatientAllergyDetailID' => '0EBAD936-4285-46F2-81AD-4F9E29A8F38D',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'y',
                'LastUpdatedBy' => '914e7915-565c-4227-9195-cb6dc3958431',
                'LastUpdatedOn' => '2024-05-28 17:21:27.917',
            ),
            5 => 
            array (
                'PatientAllergyDetailID' => '69CAADC7-E367-4C4A-BB84-511603789299',
                'PatientID' => '8484E7BC-C86C-498B-B516-446577D4F21F',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '1',
                'AllergyAttributeText' => '',
                'LastUpdatedBy' => '8484e7bc-c86c-498b-b516-446577d4f21f',
                'LastUpdatedOn' => '2024-08-02 17:15:50.557',
            ),
            6 => 
            array (
                'PatientAllergyDetailID' => '64B3245F-FD78-40CB-B18B-90D3B09BEFF3',
                'PatientID' => '914E7915-565C-4227-9195-CB6DC3958431',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'yes',
                'LastUpdatedBy' => '914e7915-565c-4227-9195-cb6dc3958431',
                'LastUpdatedOn' => '2024-05-28 17:21:27.917',
            ),
            7 => 
            array (
                'PatientAllergyDetailID' => 'D7AC7884-3D1D-428F-9D17-A3F6075D632C',
                'PatientID' => '6DAAF65F-D624-4C79-8AA4-913AD5E6D968',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'yes',
                'LastUpdatedBy' => '6daaf65f-d624-4c79-8aa4-913ad5e6d968',
                'LastUpdatedOn' => '2020-08-01 19:02:29.360',
            ),
            8 => 
            array (
                'PatientAllergyDetailID' => 'EB96D030-7D29-4E6C-A488-BB5EDFAD4DA6',
                'PatientID' => 'AC705EBD-B5EB-4684-987E-A3B8F5BD782A',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '1',
                'AllergyAttributeText' => '',
                'LastUpdatedBy' => 'ac705ebd-b5eb-4684-987e-a3b8f5bd782a',
                'LastUpdatedOn' => '2024-03-02 16:34:36.397',
            ),
            9 => 
            array (
                'PatientAllergyDetailID' => '491EB4E1-720E-400A-96AB-C2877B138C10',
                'PatientID' => '01B0C3E7-75C7-4E44-B2BF-5A4958C01B55',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'YES',
                'LastUpdatedBy' => '01b0c3e7-75c7-4e44-b2bf-5a4958c01b55',
                'LastUpdatedOn' => '2023-11-18 13:25:20.027',
            ),
            10 => 
            array (
                'PatientAllergyDetailID' => 'A484C988-B652-46EC-936C-D534B67B222E',
                'PatientID' => '12FA3019-33AE-4A3D-A2E8-24280780D073',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '13',
                'AllergyAttributeValue' => '0',
                'AllergyAttributeText' => 'Allergy',
                'LastUpdatedBy' => '12fa3019-33ae-4a3d-a2e8-24280780d073',
                'LastUpdatedOn' => '2024-11-16 13:15:28.467',
            ),
            11 => 
            array (
                'PatientAllergyDetailID' => '36416D64-37AD-4508-B41B-FE953C8E5145',
                'PatientID' => '12FA3019-33AE-4A3D-A2E8-24280780D073',
                'AllergyAttributesCategory' => 'Allergies',
                'AllergyAttributesID' => '14',
                'AllergyAttributeValue' => '1',
                'AllergyAttributeText' => '',
                'LastUpdatedBy' => '12fa3019-33ae-4a3d-a2e8-24280780d073',
                'LastUpdatedOn' => '2024-11-16 13:15:28.467',
            ),
        ));
        
        
    }
}