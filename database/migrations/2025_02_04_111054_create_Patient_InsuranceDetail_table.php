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
        Schema::create('Patient_InsuranceDetail', function (Blueprint $table) {
            $table->uuid('PatientInsuranceID')->default('newid()');
            $table->uuid('PatientID');
            $table->boolean('IsDentalInsurance')->nullable()->default(false);
            $table->boolean('IsOrthodonticInsurance')->nullable()->default(false);
            $table->string('PrimaryInsurerName', 50)->nullable();
            $table->string('PrimarySubscriberID', 50)->nullable();
            $table->string('PrimaryGroupNo', 50)->nullable();
            $table->string('SecondaryInsurerName', 50)->nullable();
            $table->string('SecondarySubscriberID', 50)->nullable();
            $table->string('SecondaryGroupNo', 50)->nullable();
            $table->string('TertiaryInsurerName', 50)->nullable();
            $table->string('TertiarySubscriberID', 50)->nullable();
            $table->string('TertiaryGroupNo', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['PatientInsuranceID'], 'pk_patient_insurancedetail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Patient_InsuranceDetail');
    }
};
