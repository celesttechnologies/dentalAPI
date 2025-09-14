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
        Schema::create('PatientTreatments', function (Blueprint $table) {
            $table->uuid('PatientTreatmentID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->unsignedInteger('TreatmentTypeID');
            $table->string('TeethTreatment', 1000)->nullable();
            $table->string('TreatmentDetails', 1000);
            $table->decimal('TreamentCost', 19, 4)->nullable();
            $table->decimal('TreatmentPayment', 19, 4)->nullable();
            $table->decimal('TreatmentBalance', 19, 4)->nullable();
            $table->dateTime('TreatmentDate')->nullable();
            $table->uuid('ProviderInchargeID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn');
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn');
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientTreatmentID'], 'pk_patienttreatments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientTreatments');
    }
};
