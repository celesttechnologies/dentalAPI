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
        Schema::create('PatientMedicalCertificates', function (Blueprint $table) {
            $table->uuid('PatientMedicalCertificateID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->dateTime('DateFrom')->useCurrent();
            $table->dateTime('DateTo')->nullable();
            $table->text('Reason')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->dateTime('OutPatientOn')->nullable();
            $table->dateTime('InPatientFrom')->nullable();
            $table->dateTime('InPatientTo')->nullable();
            $table->unsignedInteger('CertificateTypeID')->nullable()->default(1)->comment('1:> Medical Certificate. 
2:> Visit Certificate. ');

            $table->primary(['PatientMedicalCertificateID'], 'pk_patientmedicalcertificates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientMedicalCertificates');
    }
};
