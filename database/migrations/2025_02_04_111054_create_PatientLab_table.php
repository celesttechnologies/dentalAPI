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
        Schema::create('PatientLab', function (Blueprint $table) {
            $table->uuid('PatientLabID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->dateTime('DateOfLabWork');
            $table->dateTime('TimeOfLabWork')->nullable();
            $table->string('Work', 50)->nullable();
            $table->unsignedInteger('Shade');
            $table->boolean('MT')->nullable()->default(false);
            $table->string('Bisque', 50)->nullable();
            $table->string('Finish', 50)->nullable();
            $table->string('Denture', 50)->nullable();
            $table->dateTime('DelDate')->nullable();
            $table->dateTime('DelTime')->nullable();
            $table->dateTime('RecDate')->nullable();
            $table->text('Remark')->nullable();
            $table->dateTime('RecTime')->nullable();
            $table->unsignedInteger('LabID');
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->string('ReferenceNo', 11);
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientLabID'], 'pk_patientlab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientLab');
    }
};
