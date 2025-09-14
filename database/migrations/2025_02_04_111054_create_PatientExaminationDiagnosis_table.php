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
        Schema::create('PatientExaminationDiagnosis', function (Blueprint $table) {
            $table->uuid('PatientExaminationDiagnosisID');
            $table->uuid('PatientExaminationID')->nullable()->default('newid()');
            $table->unsignedInteger('TreatmentTypeID');
            $table->text('Description')->nullable();
            $table->text('TeethTreatments')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientExaminationDiagnosisID'], 'pk_patientexaminationdiagnosis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientExaminationDiagnosis');
    }
};
