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
        Schema::create('PatientDrugsPrescription', function (Blueprint $table) {
            $table->uuid('PatientDrugsPrescriptionsID');
            $table->uuid('PatientPrescriptionID');
            $table->uuid('DrugID');
            $table->unsignedInteger('FrequencyID');
            $table->string('DosageID', 50)->nullable();
            $table->string('Duration', 50)->nullable();
            $table->text('DrugNote')->nullable();

            $table->primary(['PatientDrugsPrescriptionsID'], 'pk_patientdrugsprescription');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDrugsPrescription');
    }
};
