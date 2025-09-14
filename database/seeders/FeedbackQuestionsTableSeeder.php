<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('FeedbackQuestions')->delete();
        
        \DB::table('FeedbackQuestions')->insert(array (
            0 => 
            array (
                'Id' => '1',
                'Question' => 'Was the Waiting room and surgery rooms clean and tidy?  ',
                'QuestionType' => '2',
                'QuestionTypeDescription' => 'EAmbianceRating',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM  ',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
            1 => 
            array (
                'Id' => '2',
                'Question' => 'Did you find the staff helpful? /Upon entering our clinic, were you properly greeted, and acknowledged by our staff?  ',
                'QuestionType' => '2',
                'QuestionTypeDescription' => 'EBehaviourRating',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
            2 => 
            array (
                'Id' => '3',
                'Question' => 'How would you rate your wait time in clinic ?  ',
                'QuestionType' => '2',
                'QuestionTypeDescription' => 'EWaitTimeRating',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
            3 => 
            array (
                'Id' => '4',
                'Question' => 'how would you rate your dentist',
                'QuestionType' => '2',
                'QuestionTypeDescription' => 'EentistRating',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
            4 => 
            array (
                'Id' => '5',
                'Question' => 'How likely is it that you would recommend this clinic to a friend or family member?  ',
                'QuestionType' => '2',
                'QuestionTypeDescription' => 'ERecommendRating',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
            5 => 
            array (
                'Id' => '6',
                'Question' => 'Suggessions if any?  ',
                'QuestionType' => '4',
                'QuestionTypeDescription' => 'suggessions',
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => '2014-11-22 22:54:18.903',
                'UpdatedBy' => 'SYSTEM',
                'UpdatedDate' => '2014-11-22 22:54:18.903',
                'IsDeleted' => 'N',
            ),
        ));
        
        
    }
}