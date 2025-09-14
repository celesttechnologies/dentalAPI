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
        Schema::create('PatientMedicalAttributes', function (Blueprint $table) {
            $table->uuid('PatientMedicalDetailID');
            $table->uuid('PatientID');
            $table->dateTime('Date')->nullable();
            $table->unsignedInteger('MedicalAttributes')->nullable();
            $table->string('MedicalAttributesCategory', 50)->nullable();
            $table->string('MedicalAttributeValue', 50)->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();

            $table->primary(['PatientMedicalDetailID'], 'pk_patientmedicalattributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientMedicalAttributes');
    }
};
