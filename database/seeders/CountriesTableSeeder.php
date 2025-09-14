<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'CountryID' => '2',
                'CountryCode' => 'AE',
                'CountryName' => 'United Arab Emirates',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            1 => 
            array (
                'CountryID' => '3',
                'CountryCode' => 'AF',
                'CountryName' => 'Afghanistan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            2 => 
            array (
                'CountryID' => '4',
                'CountryCode' => 'AG',
                'CountryName' => 'Antigua and Barbuda',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            3 => 
            array (
                'CountryID' => '5',
                'CountryCode' => 'AI',
                'CountryName' => 'Anguilla',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            4 => 
            array (
                'CountryID' => '6',
                'CountryCode' => 'AL',
                'CountryName' => 'Albania',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            5 => 
            array (
                'CountryID' => '7',
                'CountryCode' => 'AM',
                'CountryName' => 'Armenia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            6 => 
            array (
                'CountryID' => '8',
                'CountryCode' => 'AN',
                'CountryName' => 'Netherlands Antilles',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            7 => 
            array (
                'CountryID' => '9',
                'CountryCode' => 'AO',
                'CountryName' => 'Angola',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            8 => 
            array (
                'CountryID' => '10',
                'CountryCode' => 'AQ',
                'CountryName' => 'Antarctica',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            9 => 
            array (
                'CountryID' => '11',
                'CountryCode' => 'AR',
                'CountryName' => 'Argentina',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            10 => 
            array (
                'CountryID' => '12',
                'CountryCode' => 'AS',
                'CountryName' => 'American Samoa',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            11 => 
            array (
                'CountryID' => '13',
                'CountryCode' => 'AT',
                'CountryName' => 'Austria',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            12 => 
            array (
                'CountryID' => '14',
                'CountryCode' => 'AU',
                'CountryName' => 'Australia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            13 => 
            array (
                'CountryID' => '15',
                'CountryCode' => 'AW',
                'CountryName' => 'Aruba',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            14 => 
            array (
                'CountryID' => '16',
                'CountryCode' => 'AX',
                'CountryName' => 'Aland Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            15 => 
            array (
                'CountryID' => '17',
                'CountryCode' => 'AZ',
                'CountryName' => 'Azerbaijan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            16 => 
            array (
                'CountryID' => '18',
                'CountryCode' => 'BA',
                'CountryName' => 'Bosnia-Herzegovina',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            17 => 
            array (
                'CountryID' => '19',
                'CountryCode' => 'BB',
                'CountryName' => 'Barbados',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            18 => 
            array (
                'CountryID' => '20',
                'CountryCode' => 'BD',
                'CountryName' => 'Bangladesh',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            19 => 
            array (
                'CountryID' => '21',
                'CountryCode' => 'BE',
                'CountryName' => 'Belgium',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            20 => 
            array (
                'CountryID' => '22',
                'CountryCode' => 'BF',
                'CountryName' => 'Burkina Faso',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            21 => 
            array (
                'CountryID' => '23',
                'CountryCode' => 'BG',
                'CountryName' => 'Bulgaria',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            22 => 
            array (
                'CountryID' => '24',
                'CountryCode' => 'BH',
                'CountryName' => 'Bahrain',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            23 => 
            array (
                'CountryID' => '25',
                'CountryCode' => 'BI',
                'CountryName' => 'Burundi',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            24 => 
            array (
                'CountryID' => '26',
                'CountryCode' => 'BJ',
                'CountryName' => 'Benin',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            25 => 
            array (
                'CountryID' => '27',
                'CountryCode' => 'BM',
                'CountryName' => 'Bermuda',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            26 => 
            array (
                'CountryID' => '28',
                'CountryCode' => 'BN',
                'CountryName' => 'Brunei Darussalam',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            27 => 
            array (
                'CountryID' => '29',
                'CountryCode' => 'BO',
                'CountryName' => 'Bolivia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            28 => 
            array (
                'CountryID' => '30',
                'CountryCode' => 'BR',
                'CountryName' => 'Brazil',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            29 => 
            array (
                'CountryID' => '31',
                'CountryCode' => 'BS',
                'CountryName' => 'Bahamas',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            30 => 
            array (
                'CountryID' => '32',
                'CountryCode' => 'BT',
                'CountryName' => 'Bhutan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            31 => 
            array (
                'CountryID' => '33',
                'CountryCode' => 'BV',
                'CountryName' => 'Bouvet Island',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            32 => 
            array (
                'CountryID' => '34',
                'CountryCode' => 'BW',
                'CountryName' => 'Botswana',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            33 => 
            array (
                'CountryID' => '35',
                'CountryCode' => 'BY',
                'CountryName' => 'Belarus',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            34 => 
            array (
                'CountryID' => '36',
                'CountryCode' => 'BZ',
                'CountryName' => 'Belize',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            35 => 
            array (
                'CountryID' => '37',
                'CountryCode' => 'CA',
                'CountryName' => 'Canada',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            36 => 
            array (
                'CountryID' => '38',
                'CountryCode' => 'CC',
            'CountryName' => 'Cocos (Keeling) Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            37 => 
            array (
                'CountryID' => '39',
                'CountryCode' => 'CD',
            'CountryName' => 'Congo (Democratic Republic)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            38 => 
            array (
                'CountryID' => '40',
                'CountryCode' => 'CF',
                'CountryName' => 'Central African Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            39 => 
            array (
                'CountryID' => '41',
                'CountryCode' => 'CG',
            'CountryName' => 'Congo (Brazzaville)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            40 => 
            array (
                'CountryID' => '42',
                'CountryCode' => 'CH',
                'CountryName' => 'Switzerland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            41 => 
            array (
                'CountryID' => '43',
                'CountryCode' => 'CI',
                'CountryName' => 'Cote d\'Ivoire',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            42 => 
            array (
                'CountryID' => '44',
                'CountryCode' => 'CK',
                'CountryName' => 'Cook Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            43 => 
            array (
                'CountryID' => '45',
                'CountryCode' => 'CL',
                'CountryName' => 'Chile',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            44 => 
            array (
                'CountryID' => '46',
                'CountryCode' => 'CM',
                'CountryName' => 'Cameroon Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            45 => 
            array (
                'CountryID' => '47',
                'CountryCode' => 'CN',
                'CountryName' => 'China',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            46 => 
            array (
                'CountryID' => '48',
                'CountryCode' => 'CO',
                'CountryName' => 'Colombia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            47 => 
            array (
                'CountryID' => '49',
                'CountryCode' => 'CR',
                'CountryName' => 'Costa Rica',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            48 => 
            array (
                'CountryID' => '50',
                'CountryCode' => 'CS',
                'CountryName' => 'Serbia and Montenegro',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            49 => 
            array (
                'CountryID' => '51',
                'CountryCode' => 'CU',
                'CountryName' => 'Cuba',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            50 => 
            array (
                'CountryID' => '52',
                'CountryCode' => 'CV',
                'CountryName' => 'Cape Verde',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            51 => 
            array (
                'CountryID' => '53',
                'CountryCode' => 'CX',
                'CountryName' => 'Christmas Island',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            52 => 
            array (
                'CountryID' => '54',
                'CountryCode' => 'CY',
                'CountryName' => 'Cyprus',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            53 => 
            array (
                'CountryID' => '55',
                'CountryCode' => 'CZ',
                'CountryName' => 'Czech Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            54 => 
            array (
                'CountryID' => '56',
                'CountryCode' => 'DE',
                'CountryName' => 'Germany',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            55 => 
            array (
                'CountryID' => '57',
                'CountryCode' => 'DJ',
                'CountryName' => 'Djibouti',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            56 => 
            array (
                'CountryID' => '58',
                'CountryCode' => 'DK',
                'CountryName' => 'Denmark',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            57 => 
            array (
                'CountryID' => '59',
                'CountryCode' => 'DM',
                'CountryName' => 'Dominica',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            58 => 
            array (
                'CountryID' => '60',
                'CountryCode' => 'DO',
                'CountryName' => 'Dominican Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            59 => 
            array (
                'CountryID' => '61',
                'CountryCode' => 'DZ',
                'CountryName' => 'Algeria',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            60 => 
            array (
                'CountryID' => '62',
                'CountryCode' => 'EC',
                'CountryName' => 'Ecuador',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            61 => 
            array (
                'CountryID' => '63',
                'CountryCode' => 'EE',
                'CountryName' => 'Estonia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            62 => 
            array (
                'CountryID' => '64',
                'CountryCode' => 'EG',
                'CountryName' => 'Egypt',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            63 => 
            array (
                'CountryID' => '65',
                'CountryCode' => 'EH',
                'CountryName' => 'Western Sahara',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            64 => 
            array (
                'CountryID' => '66',
                'CountryCode' => 'ER',
                'CountryName' => 'Eritrea',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            65 => 
            array (
                'CountryID' => '67',
                'CountryCode' => 'ES',
                'CountryName' => 'Spain',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            66 => 
            array (
                'CountryID' => '68',
                'CountryCode' => 'ET',
                'CountryName' => 'Ethiopia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            67 => 
            array (
                'CountryID' => '69',
                'CountryCode' => 'FI',
                'CountryName' => 'Finland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            68 => 
            array (
                'CountryID' => '70',
                'CountryCode' => 'FJ',
                'CountryName' => 'Fiji Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            69 => 
            array (
                'CountryID' => '71',
                'CountryCode' => 'FK',
                'CountryName' => 'Falkland Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            70 => 
            array (
                'CountryID' => '72',
                'CountryCode' => 'FM',
                'CountryName' => 'Micronesia, Federal States of',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            71 => 
            array (
                'CountryID' => '73',
                'CountryCode' => 'FO',
                'CountryName' => 'Faroe Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            72 => 
            array (
                'CountryID' => '74',
                'CountryCode' => 'FR',
                'CountryName' => 'France',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            73 => 
            array (
                'CountryID' => '75',
                'CountryCode' => 'GA',
                'CountryName' => 'Gabon',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            74 => 
            array (
                'CountryID' => '76',
                'CountryCode' => 'GB',
                'CountryName' => 'United Kingdom',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            75 => 
            array (
                'CountryID' => '77',
                'CountryCode' => 'GD',
                'CountryName' => 'Grenada',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            76 => 
            array (
                'CountryID' => '78',
                'CountryCode' => 'GE',
                'CountryName' => 'Georgia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            77 => 
            array (
                'CountryID' => '79',
                'CountryCode' => 'GF',
                'CountryName' => 'French Guiana',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            78 => 
            array (
                'CountryID' => '80',
                'CountryCode' => 'GH',
                'CountryName' => 'Ghana',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            79 => 
            array (
                'CountryID' => '81',
                'CountryCode' => 'GI',
                'CountryName' => 'Gibraltar',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            80 => 
            array (
                'CountryID' => '82',
                'CountryCode' => 'GL',
                'CountryName' => 'Greenland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            81 => 
            array (
                'CountryID' => '83',
                'CountryCode' => 'GM',
                'CountryName' => 'Gambia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            82 => 
            array (
                'CountryID' => '84',
                'CountryCode' => 'GN',
                'CountryName' => 'Guinea',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            83 => 
            array (
                'CountryID' => '85',
                'CountryCode' => 'GP',
                'CountryName' => 'Guadeloupe',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            84 => 
            array (
                'CountryID' => '86',
                'CountryCode' => 'GQ',
                'CountryName' => 'Equatorial Guinea',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            85 => 
            array (
                'CountryID' => '87',
                'CountryCode' => 'GR',
                'CountryName' => 'Greece',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            86 => 
            array (
                'CountryID' => '88',
                'CountryCode' => 'GS',
                'CountryName' => 'South Georgia, Sandwich Isl.',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            87 => 
            array (
                'CountryID' => '89',
                'CountryCode' => 'GT',
                'CountryName' => 'Guatemala',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            88 => 
            array (
                'CountryID' => '90',
                'CountryCode' => 'GU',
                'CountryName' => 'Guam',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            89 => 
            array (
                'CountryID' => '91',
                'CountryCode' => 'GW',
                'CountryName' => 'Guinea-Bissau',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            90 => 
            array (
                'CountryID' => '92',
                'CountryCode' => 'GY',
                'CountryName' => 'Guyana',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            91 => 
            array (
                'CountryID' => '93',
                'CountryCode' => 'HK',
                'CountryName' => 'Hong Kong',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            92 => 
            array (
                'CountryID' => '94',
                'CountryCode' => 'HM',
                'CountryName' => 'Heard Is. and McDonald Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            93 => 
            array (
                'CountryID' => '95',
                'CountryCode' => 'HN',
                'CountryName' => 'Honduras',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            94 => 
            array (
                'CountryID' => '96',
                'CountryCode' => 'HR',
                'CountryName' => 'Croatia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            95 => 
            array (
                'CountryID' => '97',
                'CountryCode' => 'HT',
                'CountryName' => 'Haiti',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            96 => 
            array (
                'CountryID' => '98',
                'CountryCode' => 'HU',
                'CountryName' => 'Hungary',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            97 => 
            array (
                'CountryID' => '99',
                'CountryCode' => 'ID',
                'CountryName' => 'Indonesia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            98 => 
            array (
                'CountryID' => '100',
                'CountryCode' => 'IE',
                'CountryName' => 'Ireland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            99 => 
            array (
                'CountryID' => '101',
                'CountryCode' => 'IL',
                'CountryName' => 'Israel',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            100 => 
            array (
                'CountryID' => '102',
                'CountryCode' => 'IN',
                'CountryName' => 'India',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            101 => 
            array (
                'CountryID' => '103',
                'CountryCode' => 'IO',
                'CountryName' => 'British Indian Ocean Territory',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            102 => 
            array (
                'CountryID' => '104',
                'CountryCode' => 'IQ',
                'CountryName' => 'Iraq',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            103 => 
            array (
                'CountryID' => '105',
                'CountryCode' => 'IR',
                'CountryName' => 'Iran, Islamic Republic of',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            104 => 
            array (
                'CountryID' => '106',
                'CountryCode' => 'IS',
                'CountryName' => 'Iceland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            105 => 
            array (
                'CountryID' => '107',
                'CountryCode' => 'IT',
                'CountryName' => 'Italy',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            106 => 
            array (
                'CountryID' => '108',
                'CountryCode' => 'JM',
                'CountryName' => 'Jamaica',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            107 => 
            array (
                'CountryID' => '109',
                'CountryCode' => 'JO',
                'CountryName' => 'Jordan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            108 => 
            array (
                'CountryID' => '110',
                'CountryCode' => 'JP',
                'CountryName' => 'Japan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            109 => 
            array (
                'CountryID' => '111',
                'CountryCode' => 'KE',
                'CountryName' => 'Kenya',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            110 => 
            array (
                'CountryID' => '112',
                'CountryCode' => 'KG',
                'CountryName' => 'Kyrgyzstan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            111 => 
            array (
                'CountryID' => '113',
                'CountryCode' => 'KH',
                'CountryName' => 'Cambodia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            112 => 
            array (
                'CountryID' => '114',
                'CountryCode' => 'KI',
                'CountryName' => 'Kiribati',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            113 => 
            array (
                'CountryID' => '115',
                'CountryCode' => 'KM',
                'CountryName' => 'Comoros',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            114 => 
            array (
                'CountryID' => '116',
                'CountryCode' => 'KN',
                'CountryName' => 'Saint Kitts and Nevis',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            115 => 
            array (
                'CountryID' => '117',
                'CountryCode' => 'KP',
            'CountryName' => 'Korea (North)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            116 => 
            array (
                'CountryID' => '118',
                'CountryCode' => 'KR',
            'CountryName' => 'Korea (South)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            117 => 
            array (
                'CountryID' => '119',
                'CountryCode' => 'KW',
                'CountryName' => 'Kuwait',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            118 => 
            array (
                'CountryID' => '120',
                'CountryCode' => 'KY',
                'CountryName' => 'Cayman Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            119 => 
            array (
                'CountryID' => '121',
                'CountryCode' => 'KZ',
                'CountryName' => 'Kazakhstan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            120 => 
            array (
                'CountryID' => '122',
                'CountryCode' => 'LA',
                'CountryName' => 'Laos',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            121 => 
            array (
                'CountryID' => '123',
                'CountryCode' => 'LB',
                'CountryName' => 'Lebanon',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            122 => 
            array (
                'CountryID' => '124',
                'CountryCode' => 'LC',
                'CountryName' => 'Saint Lucia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            123 => 
            array (
                'CountryID' => '125',
                'CountryCode' => 'LI',
                'CountryName' => 'Liechtenstein',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            124 => 
            array (
                'CountryID' => '126',
                'CountryCode' => 'LK',
                'CountryName' => 'Sri Lanka',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            125 => 
            array (
                'CountryID' => '127',
                'CountryCode' => 'LR',
                'CountryName' => 'Liberia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            126 => 
            array (
                'CountryID' => '128',
                'CountryCode' => 'LS',
                'CountryName' => 'Lesotho',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            127 => 
            array (
                'CountryID' => '129',
                'CountryCode' => 'LT',
                'CountryName' => 'Lithuania',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            128 => 
            array (
                'CountryID' => '130',
                'CountryCode' => 'LU',
                'CountryName' => 'Luxembourg',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            129 => 
            array (
                'CountryID' => '131',
                'CountryCode' => 'LV',
                'CountryName' => 'Latvia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            130 => 
            array (
                'CountryID' => '132',
                'CountryCode' => 'LY',
                'CountryName' => 'Libya',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            131 => 
            array (
                'CountryID' => '133',
                'CountryCode' => 'MA',
                'CountryName' => 'Morocco',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            132 => 
            array (
                'CountryID' => '134',
                'CountryCode' => 'MC',
                'CountryName' => 'Monaco',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            133 => 
            array (
                'CountryID' => '135',
                'CountryCode' => 'MD',
                'CountryName' => 'Moldova, Republic of',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            134 => 
            array (
                'CountryID' => '136',
                'CountryCode' => 'MG',
                'CountryName' => 'Madagascar',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            135 => 
            array (
                'CountryID' => '137',
                'CountryCode' => 'MH',
                'CountryName' => 'Marshall Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            136 => 
            array (
                'CountryID' => '138',
                'CountryCode' => 'MK',
                'CountryName' => 'Macedonia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            137 => 
            array (
                'CountryID' => '139',
                'CountryCode' => 'ML',
                'CountryName' => 'Mali Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            138 => 
            array (
                'CountryID' => '140',
                'CountryCode' => 'MM',
                'CountryName' => 'Myanmar',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            139 => 
            array (
                'CountryID' => '141',
                'CountryCode' => 'MN',
                'CountryName' => 'Mongolia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            140 => 
            array (
                'CountryID' => '142',
                'CountryCode' => 'MO',
                'CountryName' => 'Macao',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            141 => 
            array (
                'CountryID' => '143',
                'CountryCode' => 'MP',
                'CountryName' => 'Northern Mariana Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            142 => 
            array (
                'CountryID' => '144',
                'CountryCode' => 'MQ',
                'CountryName' => 'Martinique',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            143 => 
            array (
                'CountryID' => '145',
                'CountryCode' => 'MR',
                'CountryName' => 'Mauritania',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            144 => 
            array (
                'CountryID' => '146',
                'CountryCode' => 'MS',
                'CountryName' => 'Montserrat',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            145 => 
            array (
                'CountryID' => '147',
                'CountryCode' => 'MT',
                'CountryName' => 'Malta',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            146 => 
            array (
                'CountryID' => '148',
                'CountryCode' => 'MU',
                'CountryName' => 'Mauritius',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            147 => 
            array (
                'CountryID' => '149',
                'CountryCode' => 'MV',
                'CountryName' => 'Maldives',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            148 => 
            array (
                'CountryID' => '150',
                'CountryCode' => 'MW',
                'CountryName' => 'Malawi',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            149 => 
            array (
                'CountryID' => '151',
                'CountryCode' => 'MX',
                'CountryName' => 'Mexico',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            150 => 
            array (
                'CountryID' => '152',
                'CountryCode' => 'MY',
                'CountryName' => 'Malaysia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            151 => 
            array (
                'CountryID' => '153',
                'CountryCode' => 'MZ',
                'CountryName' => 'Mozambique',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            152 => 
            array (
                'CountryID' => '154',
                'CountryCode' => 'NA',
                'CountryName' => 'Namibia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            153 => 
            array (
                'CountryID' => '155',
                'CountryCode' => 'NC',
                'CountryName' => 'New Caledonia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            154 => 
            array (
                'CountryID' => '156',
                'CountryCode' => 'NE',
                'CountryName' => 'Niger Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            155 => 
            array (
                'CountryID' => '157',
                'CountryCode' => 'NF',
                'CountryName' => 'Norfolk Island',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            156 => 
            array (
                'CountryID' => '158',
                'CountryCode' => 'NG',
                'CountryName' => 'Nigeria',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            157 => 
            array (
                'CountryID' => '159',
                'CountryCode' => 'NI',
                'CountryName' => 'Nicaragua',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            158 => 
            array (
                'CountryID' => '160',
                'CountryCode' => 'NL',
                'CountryName' => 'Netherlands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            159 => 
            array (
                'CountryID' => '161',
                'CountryCode' => 'NO',
                'CountryName' => 'Norway',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            160 => 
            array (
                'CountryID' => '162',
                'CountryCode' => 'NP',
                'CountryName' => 'Nepal',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            161 => 
            array (
                'CountryID' => '163',
                'CountryCode' => 'NR',
                'CountryName' => 'Nauru',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            162 => 
            array (
                'CountryID' => '164',
                'CountryCode' => 'NU',
                'CountryName' => 'Niue',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            163 => 
            array (
                'CountryID' => '165',
                'CountryCode' => 'NZ',
                'CountryName' => 'New Zealand',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            164 => 
            array (
                'CountryID' => '166',
                'CountryCode' => 'OM',
                'CountryName' => 'Oman',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            165 => 
            array (
                'CountryID' => '167',
                'CountryCode' => 'PA',
                'CountryName' => 'Panama',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            166 => 
            array (
                'CountryID' => '168',
                'CountryCode' => 'PE',
                'CountryName' => 'Peru',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            167 => 
            array (
                'CountryID' => '169',
                'CountryCode' => 'PF',
                'CountryName' => 'French Polynesia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            168 => 
            array (
                'CountryID' => '170',
                'CountryCode' => 'PG',
                'CountryName' => 'Papua New Guinea',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            169 => 
            array (
                'CountryID' => '171',
                'CountryCode' => 'PH',
                'CountryName' => 'Philippines',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            170 => 
            array (
                'CountryID' => '172',
                'CountryCode' => 'PK',
                'CountryName' => 'Pakistan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            171 => 
            array (
                'CountryID' => '173',
                'CountryCode' => 'PL',
                'CountryName' => 'Poland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            172 => 
            array (
                'CountryID' => '174',
                'CountryCode' => 'PM',
                'CountryName' => 'Saint Pierre and Miquelon',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            173 => 
            array (
                'CountryID' => '175',
                'CountryCode' => 'PN',
                'CountryName' => 'Pitcairn',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            174 => 
            array (
                'CountryID' => '176',
                'CountryCode' => 'PR',
                'CountryName' => 'Puerto Rico',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            175 => 
            array (
                'CountryID' => '177',
                'CountryCode' => 'PS',
                'CountryName' => 'Palestinian Territ., Occupied',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            176 => 
            array (
                'CountryID' => '178',
                'CountryCode' => 'PT',
                'CountryName' => 'Portugal',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            177 => 
            array (
                'CountryID' => '179',
                'CountryCode' => 'PW',
                'CountryName' => 'Palau',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            178 => 
            array (
                'CountryID' => '180',
                'CountryCode' => 'PY',
                'CountryName' => 'Paraguay',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            179 => 
            array (
                'CountryID' => '181',
                'CountryCode' => 'QA',
                'CountryName' => 'Qatar',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            180 => 
            array (
                'CountryID' => '182',
                'CountryCode' => 'RE',
                'CountryName' => 'Reunion',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            181 => 
            array (
                'CountryID' => '183',
                'CountryCode' => 'RO',
                'CountryName' => 'Romania',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            182 => 
            array (
                'CountryID' => '184',
                'CountryCode' => 'RU',
                'CountryName' => 'Russian Federation',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            183 => 
            array (
                'CountryID' => '185',
                'CountryCode' => 'RW',
                'CountryName' => 'Rwanda',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            184 => 
            array (
                'CountryID' => '186',
                'CountryCode' => 'SA',
                'CountryName' => 'Saudi Arabia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            185 => 
            array (
                'CountryID' => '187',
                'CountryCode' => 'SB',
                'CountryName' => 'Solomon Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            186 => 
            array (
                'CountryID' => '188',
                'CountryCode' => 'SC',
                'CountryName' => 'Seychelles',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            187 => 
            array (
                'CountryID' => '189',
                'CountryCode' => 'SD',
                'CountryName' => 'Sudan Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            188 => 
            array (
                'CountryID' => '190',
                'CountryCode' => 'SE',
                'CountryName' => 'Sweden',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            189 => 
            array (
                'CountryID' => '191',
                'CountryCode' => 'SG',
                'CountryName' => 'Singapore',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            190 => 
            array (
                'CountryID' => '192',
                'CountryCode' => 'SH',
                'CountryName' => 'Saint Helena',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            191 => 
            array (
                'CountryID' => '193',
                'CountryCode' => 'SI',
                'CountryName' => 'Slovenia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            192 => 
            array (
                'CountryID' => '194',
                'CountryCode' => 'SJ',
                'CountryName' => 'Svalbard and Jan Mayen',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            193 => 
            array (
                'CountryID' => '195',
                'CountryCode' => 'SK',
                'CountryName' => 'Slovakia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            194 => 
            array (
                'CountryID' => '196',
                'CountryCode' => 'SL',
                'CountryName' => 'Sierra Leone',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            195 => 
            array (
                'CountryID' => '197',
                'CountryCode' => 'SM',
                'CountryName' => 'San Marino',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            196 => 
            array (
                'CountryID' => '198',
                'CountryCode' => 'SN',
                'CountryName' => 'Senegal',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            197 => 
            array (
                'CountryID' => '199',
                'CountryCode' => 'SO',
                'CountryName' => 'Somali Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            198 => 
            array (
                'CountryID' => '200',
                'CountryCode' => 'SR',
                'CountryName' => 'Suriname',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            199 => 
            array (
                'CountryID' => '201',
                'CountryCode' => 'ST',
                'CountryName' => 'Sao Tome & Principe',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            200 => 
            array (
                'CountryID' => '202',
                'CountryCode' => 'SV',
                'CountryName' => 'El Salvador',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            201 => 
            array (
                'CountryID' => '203',
                'CountryCode' => 'SY',
                'CountryName' => 'Syrian Arab Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            202 => 
            array (
                'CountryID' => '204',
                'CountryCode' => 'SZ',
                'CountryName' => 'Swaziland',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            203 => 
            array (
                'CountryID' => '205',
                'CountryCode' => 'TC',
                'CountryName' => 'Turks and Caicos Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            204 => 
            array (
                'CountryID' => '206',
                'CountryCode' => 'TD',
                'CountryName' => 'Chad',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            205 => 
            array (
                'CountryID' => '207',
                'CountryCode' => 'TF',
                'CountryName' => 'French Southern Territories',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            206 => 
            array (
                'CountryID' => '208',
                'CountryCode' => 'TG',
                'CountryName' => 'Togo Republic',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            207 => 
            array (
                'CountryID' => '209',
                'CountryCode' => 'TH',
                'CountryName' => 'Thailand',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            208 => 
            array (
                'CountryID' => '210',
                'CountryCode' => 'TJ',
                'CountryName' => 'Tajikistan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            209 => 
            array (
                'CountryID' => '211',
                'CountryCode' => 'TK',
                'CountryName' => 'Tokelau',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            210 => 
            array (
                'CountryID' => '212',
                'CountryCode' => 'TL',
                'CountryName' => 'Timor-Leste',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            211 => 
            array (
                'CountryID' => '213',
                'CountryCode' => 'TM',
                'CountryName' => 'Turkmenistan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            212 => 
            array (
                'CountryID' => '214',
                'CountryCode' => 'TN',
                'CountryName' => 'Tunisia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            213 => 
            array (
                'CountryID' => '215',
                'CountryCode' => 'TO',
                'CountryName' => 'Tonga Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            214 => 
            array (
                'CountryID' => '216',
                'CountryCode' => 'TR',
                'CountryName' => 'Turkey',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            215 => 
            array (
                'CountryID' => '217',
                'CountryCode' => 'TT',
                'CountryName' => 'Trinidad/Tobago',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            216 => 
            array (
                'CountryID' => '218',
                'CountryCode' => 'TV',
                'CountryName' => 'Tuvalu',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            217 => 
            array (
                'CountryID' => '219',
                'CountryCode' => 'TW',
                'CountryName' => 'Taiwan, Province of China',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            218 => 
            array (
                'CountryID' => '220',
                'CountryCode' => 'TZ',
                'CountryName' => 'Tanzania',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            219 => 
            array (
                'CountryID' => '221',
                'CountryCode' => 'UA',
                'CountryName' => 'Ukraine',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            220 => 
            array (
                'CountryID' => '222',
                'CountryCode' => 'UG',
                'CountryName' => 'Uganda',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            221 => 
            array (
                'CountryID' => '223',
                'CountryCode' => 'UM',
                'CountryName' => 'US Minor Outlying Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            222 => 
            array (
                'CountryID' => '224',
                'CountryCode' => 'US',
                'CountryName' => 'United States',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            223 => 
            array (
                'CountryID' => '225',
                'CountryCode' => 'UY',
                'CountryName' => 'Uruguay',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            224 => 
            array (
                'CountryID' => '226',
                'CountryCode' => 'UZ',
                'CountryName' => 'Uzbekistan',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            225 => 
            array (
                'CountryID' => '227',
                'CountryCode' => 'VA',
            'CountryName' => 'Holy See (Vatican City State)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            226 => 
            array (
                'CountryID' => '228',
                'CountryCode' => 'VC',
                'CountryName' => 'Saint Vincent and Grenadines',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            227 => 
            array (
                'CountryID' => '229',
                'CountryCode' => 'VE',
                'CountryName' => 'Venezuela',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            228 => 
            array (
                'CountryID' => '230',
                'CountryCode' => 'VG',
                'CountryName' => 'Virgin Islands, British',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            229 => 
            array (
                'CountryID' => '231',
                'CountryCode' => 'VI',
                'CountryName' => 'Virgin Islands, US',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            230 => 
            array (
                'CountryID' => '232',
                'CountryCode' => 'VN',
                'CountryName' => 'Vietnam',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            231 => 
            array (
                'CountryID' => '233',
                'CountryCode' => 'VU',
                'CountryName' => 'Vanuatu',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            232 => 
            array (
                'CountryID' => '234',
                'CountryCode' => 'WF',
                'CountryName' => 'Wallis & Futuna Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            233 => 
            array (
                'CountryID' => '235',
                'CountryCode' => 'WS',
                'CountryName' => 'Samoa',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            234 => 
            array (
                'CountryID' => '236',
                'CountryCode' => 'XC',
                'CountryName' => 'Channel Islands',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            235 => 
            array (
                'CountryID' => '237',
                'CountryCode' => 'XX',
                'CountryName' => 'Unknown Country',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            236 => 
            array (
                'CountryID' => '238',
                'CountryCode' => 'YE',
            'CountryName' => 'Yemen (Rep of)',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            237 => 
            array (
                'CountryID' => '239',
                'CountryCode' => 'YT',
                'CountryName' => 'Mayotte',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            238 => 
            array (
                'CountryID' => '240',
                'CountryCode' => 'ZA',
                'CountryName' => 'South Africa',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            239 => 
            array (
                'CountryID' => '241',
                'CountryCode' => 'ZM',
                'CountryName' => 'Zambia',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            240 => 
            array (
                'CountryID' => '242',
                'CountryCode' => 'ZW',
                'CountryName' => 'Zimbabwe',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
            241 => 
            array (
                'CountryID' => '243',
                'CountryCode' => 'AD',
                'CountryName' => 'Andorra',
                'LastUpdatedBy' => NULL,
                'LastUpdatedOn' => NULL,
            ),
        ));
        
        
    }
}