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
        Schema::create('PatientExamination', function (Blueprint $table) {
            $table->uuid('PatientExaminationID')->default('newid()');
            $table->uuid('PatientID');
            $table->dateTime('DateOfDiagnosis')->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->text('ChiefComplaint')->nullable();
            $table->text('PatientDiagnosisNotes')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientExaminationID'], 'pk_patientexamination');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientExamination');
    }
};
