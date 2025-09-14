<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('State')->delete();
        
        \DB::table('State')->insert(array (
            0 => 
            array (
                'StateID' => '1',
                'CountryID' => '102',
                'StateCode' => 'Andaman and Nicobar Islands',
                'StateDesc' => 'Andaman and Nicobar Islands',
            ),
            1 => 
            array (
                'StateID' => '2',
                'CountryID' => '102',
                'StateCode' => 'Andhra Pradesh',
                'StateDesc' => 'Andhra Pradesh',
            ),
            2 => 
            array (
                'StateID' => '3',
                'CountryID' => '102',
                'StateCode' => 'Arunachal Pradesh',
                'StateDesc' => 'Arunachal Pradesh',
            ),
            3 => 
            array (
                'StateID' => '4',
                'CountryID' => '102',
                'StateCode' => 'Assam',
                'StateDesc' => 'Assam',
            ),
            4 => 
            array (
                'StateID' => '5',
                'CountryID' => '102',
                'StateCode' => 'Bihar',
                'StateDesc' => 'Bihar',
            ),
            5 => 
            array (
                'StateID' => '6',
                'CountryID' => '102',
                'StateCode' => 'Chandigarh',
                'StateDesc' => 'Chandigarh',
            ),
            6 => 
            array (
                'StateID' => '7',
                'CountryID' => '102',
                'StateCode' => 'Chhattisgarh',
                'StateDesc' => 'Chhattisgarh',
            ),
            7 => 
            array (
                'StateID' => '8',
                'CountryID' => '102',
                'StateCode' => 'Dadra and Nagar Haveli',
                'StateDesc' => 'Dadra and Nagar Haveli',
            ),
            8 => 
            array (
                'StateID' => '9',
                'CountryID' => '102',
                'StateCode' => 'Daman and Diu',
                'StateDesc' => 'Daman and Diu',
            ),
            9 => 
            array (
                'StateID' => '10',
                'CountryID' => '102',
                'StateCode' => 'Delhi',
                'StateDesc' => 'Delhi',
            ),
            10 => 
            array (
                'StateID' => '11',
                'CountryID' => '102',
                'StateCode' => 'Goa',
                'StateDesc' => 'Goa',
            ),
            11 => 
            array (
                'StateID' => '12',
                'CountryID' => '102',
                'StateCode' => 'Gujarat',
                'StateDesc' => 'Gujarat',
            ),
            12 => 
            array (
                'StateID' => '13',
                'CountryID' => '102',
                'StateCode' => 'Haryana',
                'StateDesc' => 'Haryana',
            ),
            13 => 
            array (
                'StateID' => '14',
                'CountryID' => '102',
                'StateCode' => 'Himachal Pradesh',
                'StateDesc' => 'Himachal Pradesh',
            ),
            14 => 
            array (
                'StateID' => '15',
                'CountryID' => '102',
                'StateCode' => 'Jammu and Kashmir',
                'StateDesc' => 'Jammu and Kashmir',
            ),
            15 => 
            array (
                'StateID' => '16',
                'CountryID' => '102',
                'StateCode' => 'Jharkhand',
                'StateDesc' => 'Jharkhand',
            ),
            16 => 
            array (
                'StateID' => '17',
                'CountryID' => '102',
                'StateCode' => 'Karnataka',
                'StateDesc' => 'Karnataka',
            ),
            17 => 
            array (
                'StateID' => '18',
                'CountryID' => '102',
                'StateCode' => 'Kerala',
                'StateDesc' => 'Kerala',
            ),
            18 => 
            array (
                'StateID' => '19',
                'CountryID' => '102',
                'StateCode' => 'Lakshadweep',
                'StateDesc' => 'Lakshadweep',
            ),
            19 => 
            array (
                'StateID' => '20',
                'CountryID' => '102',
                'StateCode' => 'Madhya Pradesh',
                'StateDesc' => 'Madhya Pradesh',
            ),
            20 => 
            array (
                'StateID' => '21',
                'CountryID' => '102',
                'StateCode' => 'Maharashtra',
                'StateDesc' => 'Maharashtra',
            ),
            21 => 
            array (
                'StateID' => '22',
                'CountryID' => '102',
                'StateCode' => 'Manipur',
                'StateDesc' => 'Manipur',
            ),
            22 => 
            array (
                'StateID' => '23',
                'CountryID' => '102',
                'StateCode' => 'Meghalaya',
                'StateDesc' => 'Meghalaya',
            ),
            23 => 
            array (
                'StateID' => '24',
                'CountryID' => '102',
                'StateCode' => 'Mizoram',
                'StateDesc' => 'Mizoram',
            ),
            24 => 
            array (
                'StateID' => '25',
                'CountryID' => '102',
                'StateCode' => 'Nagaland',
                'StateDesc' => 'Nagaland',
            ),
            25 => 
            array (
                'StateID' => '26',
                'CountryID' => '102',
                'StateCode' => 'Orissa',
                'StateDesc' => 'Orissa',
            ),
            26 => 
            array (
                'StateID' => '27',
                'CountryID' => '102',
                'StateCode' => 'Puducherry',
                'StateDesc' => 'Puducherry',
            ),
            27 => 
            array (
                'StateID' => '28',
                'CountryID' => '102',
                'StateCode' => 'Punjab',
                'StateDesc' => 'Punjab',
            ),
            28 => 
            array (
                'StateID' => '29',
                'CountryID' => '102',
                'StateCode' => 'Rajasthan',
                'StateDesc' => 'Rajasthan',
            ),
            29 => 
            array (
                'StateID' => '30',
                'CountryID' => '102',
                'StateCode' => 'Sikkim',
                'StateDesc' => 'Sikkim',
            ),
            30 => 
            array (
                'StateID' => '31',
                'CountryID' => '102',
                'StateCode' => 'Tamil Nadu',
                'StateDesc' => 'Tamil Nadu',
            ),
            31 => 
            array (
                'StateID' => '32',
                'CountryID' => '102',
                'StateCode' => 'Tripura',
                'StateDesc' => 'Tripura',
            ),
            32 => 
            array (
                'StateID' => '33',
                'CountryID' => '102',
                'StateCode' => 'Uttarakhand',
                'StateDesc' => 'Uttarakhand',
            ),
            33 => 
            array (
                'StateID' => '34',
                'CountryID' => '102',
                'StateCode' => 'Uttar Pradesh',
                'StateDesc' => 'Uttar Pradesh',
            ),
            34 => 
            array (
                'StateID' => '35',
                'CountryID' => '102',
                'StateCode' => 'West Bengal',
                'StateDesc' => 'West Bengal',
            ),
        ));
        
        
    }
}