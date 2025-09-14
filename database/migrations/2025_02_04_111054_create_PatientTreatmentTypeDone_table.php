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
        Schema::create('PatientTreatmentTypeDone', function (Blueprint $table) {
            $table->uuid('PatientTreatmentTypeDoneID');
            $table->uuid('PatientTreatmentDoneID');
            $table->uuid('TreatmentTypeID');
            $table->uuid('TreatmentSubTypeID')->nullable();
            $table->text('TeethTreatment')->nullable();
            $table->string('TeethTreatmentNote', 1000)->nullable();
            $table->decimal('TreatmentCost', 19, 4)->nullable();
            $table->decimal('Discount', 19, 4)->nullable()->default(0);
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->boolean('IsExpanded')->nullable()->default(false);
            $table->decimal('TreatmentTotalCost', 19, 4)->nullable();
            $table->decimal('TreatmentTax', 19, 4)->nullable();
            $table->decimal('Addition', 19, 4)->nullable()->default(0);
            $table->decimal('AmountToBeCollected', 19, 4)->nullable();

            $table->primary(['PatientTreatmentTypeDoneID'], 'pk_patienttreatmenttypedone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientTreatmentTypeDone');
    }
};
