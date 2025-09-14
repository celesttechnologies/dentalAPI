<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackResponseBaseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('FeedbackResponseBase')->delete();
        
        \DB::table('FeedbackResponseBase')->insert(array (
            0 => 
            array (
                'FeedbackResponseID' => '1',
                'FeedbackID' => '1',
                'QuestionID' => '1',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            1 => 
            array (
                'FeedbackResponseID' => '2',
                'FeedbackID' => '1',
                'QuestionID' => '2',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            2 => 
            array (
                'FeedbackResponseID' => '3',
                'FeedbackID' => '1',
                'QuestionID' => '3',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            3 => 
            array (
                'FeedbackResponseID' => '4',
                'FeedbackID' => '1',
                'QuestionID' => '4',
                'QuestionTypeID' => '2',
                'ResponseValue' => '4',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            4 => 
            array (
                'FeedbackResponseID' => '5',
                'FeedbackID' => '1',
                'QuestionID' => '5',
                'QuestionTypeID' => '2',
                'ResponseValue' => '4',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            5 => 
            array (
                'FeedbackResponseID' => '6',
                'FeedbackID' => '1',
                'QuestionID' => '6',
                'QuestionTypeID' => '2',
                'ResponseValue' => 'test',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:18:48.057',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            6 => 
            array (
                'FeedbackResponseID' => '7',
                'FeedbackID' => '2',
                'QuestionID' => '1',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            7 => 
            array (
                'FeedbackResponseID' => '8',
                'FeedbackID' => '2',
                'QuestionID' => '2',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            8 => 
            array (
                'FeedbackResponseID' => '9',
                'FeedbackID' => '2',
                'QuestionID' => '3',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            9 => 
            array (
                'FeedbackResponseID' => '10',
                'FeedbackID' => '2',
                'QuestionID' => '4',
                'QuestionTypeID' => '2',
                'ResponseValue' => '4',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            10 => 
            array (
                'FeedbackResponseID' => '11',
                'FeedbackID' => '2',
                'QuestionID' => '5',
                'QuestionTypeID' => '2',
                'ResponseValue' => '2',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            11 => 
            array (
                'FeedbackResponseID' => '12',
                'FeedbackID' => '2',
                'QuestionID' => '6',
                'QuestionTypeID' => '2',
                'ResponseValue' => 'testing',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-03 12:34:19.730',
                'UpdatedBy' => ' ',
                'UpdatedOn' => '1900-01-01 00:00:00.000',
            ),
            12 => 
            array (
                'FeedbackResponseID' => '1002',
                'FeedbackID' => '1002',
                'QuestionID' => '1',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            13 => 
            array (
                'FeedbackResponseID' => '1003',
                'FeedbackID' => '1002',
                'QuestionID' => '2',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            14 => 
            array (
                'FeedbackResponseID' => '1004',
                'FeedbackID' => '1002',
                'QuestionID' => '3',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            15 => 
            array (
                'FeedbackResponseID' => '1005',
                'FeedbackID' => '1002',
                'QuestionID' => '4',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            16 => 
            array (
                'FeedbackResponseID' => '1006',
                'FeedbackID' => '1002',
                'QuestionID' => '5',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            17 => 
            array (
                'FeedbackResponseID' => '1007',
                'FeedbackID' => '1002',
                'QuestionID' => '6',
                'QuestionTypeID' => '2',
                'ResponseValue' => 'Good Doctor',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-04-20 08:17:23.867',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-04-20 08:17:23.867',
            ),
            18 => 
            array (
                'FeedbackResponseID' => '2002',
                'FeedbackID' => '2002',
                'QuestionID' => '1',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
            19 => 
            array (
                'FeedbackResponseID' => '2003',
                'FeedbackID' => '2002',
                'QuestionID' => '2',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
            20 => 
            array (
                'FeedbackResponseID' => '2004',
                'FeedbackID' => '2002',
                'QuestionID' => '3',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
            21 => 
            array (
                'FeedbackResponseID' => '2005',
                'FeedbackID' => '2002',
                'QuestionID' => '4',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
            22 => 
            array (
                'FeedbackResponseID' => '2006',
                'FeedbackID' => '2002',
                'QuestionID' => '5',
                'QuestionTypeID' => '2',
                'ResponseValue' => '5',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
            23 => 
            array (
                'FeedbackResponseID' => '2007',
                'FeedbackID' => '2002',
                'QuestionID' => '6',
                'QuestionTypeID' => '2',
                'ResponseValue' => 'Good Doctor',
                'ResponseDescription' => '',
                'CreatedBy' => 'System',
                'CreatedOn' => '2024-05-20 05:27:15.597',
                'UpdatedBy' => 'System',
                'UpdatedOn' => '2024-05-20 05:27:15.597',
            ),
        ));
        
        
    }
}