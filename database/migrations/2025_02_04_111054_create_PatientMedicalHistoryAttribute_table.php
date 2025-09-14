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
        Schema::create('PatientMedicalHistoryAttribute', function (Blueprint $table) {
            $table->uuid('PatientMedicalDetailID')->default('newid()');
            $table->uuid('PatientID');
            $table->string('MedicalAttributesCategory', 50);
            $table->unsignedInteger('MedicalAttributesID');
            $table->string('MedicalAttributeValue', 50)->nullable()->comment('0 --> No
1 --> Yes
2--> dk/u');
            $table->text('MedicalAttributeText')->nullable();
            $table->dateTime('MedicalHistoryDate')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['PatientMedicalDetailID'], 'pk_patientmedicalhistoryattributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientMedicalHistoryAttribute');
    }
};
