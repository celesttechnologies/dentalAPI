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
        Schema::create('PatientDiagnosis', function (Blueprint $table) {
            $table->uuid('PatientDiagnosisID');
            $table->uuid('PatientID');
            $table->dateTime('DateOfDiagnosis')->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->text('ChiefComplaint')->nullable();
            $table->text('PatientDiagnosisNotes')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientDiagnosisID'], 'pk_patientdiagnosis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDiagnosis');
    }
};
