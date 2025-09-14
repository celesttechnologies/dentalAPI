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
        Schema::create('FeedbackResponseBase', function (Blueprint $table) {
            $table->increments('FeedbackResponseID');
            $table->unsignedInteger('FeedbackID');
            $table->unsignedInteger('QuestionID');
            $table->unsignedInteger('QuestionTypeID');
            $table->string('ResponseValue', 50)->nullable();
            $table->text('ResponseDescription')->nullable();
            $table->string('CreatedBy', 50);
            $table->dateTime('CreatedOn');
            $table->string('UpdatedBy', 50)->nullable();
            $table->dateTime('UpdatedOn')->nullable();

            $table->primary(['FeedbackResponseID'], 'pk_feedbaseresponse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FeedbackResponseBase');
    }
};
