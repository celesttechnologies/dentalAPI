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
        Schema::create('PatientPrescriptions', function (Blueprint $table) {
            $table->uuid('PatientPrescriptionID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->text('PrescriptionNote')->nullable();
            $table->dateTime('DateOfPrescription')->useCurrent();
            $table->dateTime('NextFollowUp')->nullable();
            $table->text('InvestigationAdvisedIDCSV')->nullable();
            $table->uuid('PatientInvestigationID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->boolean('IsFolloupSMSRequired')->nullable()->default(false);

            $table->primary(['PatientPrescriptionID'], 'pk_patientprescriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientPrescriptions');
    }
};
