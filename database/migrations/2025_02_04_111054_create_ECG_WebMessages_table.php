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
        Schema::create('ECG_WebMessages', function (Blueprint $table) {
            $table->uuid('MessageID')->default('newid()');
            $table->unsignedInteger('RequestIntID');
            $table->unsignedInteger('RequestTypeID')->nullable();
            $table->string('FirstName', 100)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('ContactNumber', 50)->nullable();
            $table->string('ClinicName')->nullable();
            $table->text('ClinicAddress')->nullable();
            $table->text('OtherDetails')->nullable();
            $table->text('Message')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['MessageID'], 'pk_ecg_webmessages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_WebMessages');
    }
};
