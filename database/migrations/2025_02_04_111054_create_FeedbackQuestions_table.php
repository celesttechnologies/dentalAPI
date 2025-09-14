<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('FeedbackQuestions', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Question', 500);
            $table->unsignedInteger('QuestionType');
            $table->string('QuestionTypeDescription', 50);
            $table->string('CreatedBy', 50);
            $table->dateTime('CreatedDate');
            $table->string('UpdatedBy', 50);
            $table->dateTime('UpdatedDate');
            $table->string('IsDeleted', 1)->default('N');

            $table->primary(['Id'], 'pk_recommendationmaster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FeedbackQuestions');
    }
};
