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
        Schema::create('FeedbackResponse', function (Blueprint $table) {
            $table->increments('FeedbackID');
            $table->uuid('ClinicID');
            $table->uuid('PatientID')->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->string('PatientName', 250)->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->dateTime('DateOfFeedBack');
            $table->string('IsDeleted', 1)->default('N');
            $table->string('CreatedBy', 50);
            $table->dateTime('CreatedOn');
            $table->string('UpdatedBy', 50)->nullable();
            $table->dateTime('UpdatedOn')->nullable();
            $table->unsignedInteger('Status');

            $table->primary(['FeedbackID'], 'pk_feedbackresbase');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FeedbackResponse');
    }
};
