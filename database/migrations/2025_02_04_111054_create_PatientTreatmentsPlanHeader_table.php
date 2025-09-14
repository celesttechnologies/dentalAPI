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
        Schema::create('PatientTreatmentsPlanHeader', function (Blueprint $table) {
            $table->uuid('PatientTreatmentPlanHeaderID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->text('TreatmentPlanName')->nullable();
            $table->decimal('TreatmentCost', 19, 4)->nullable();
            $table->decimal('TreatmentDiscount', 19, 4)->nullable()->default(0);
            $table->decimal('TreatmentTax', 19, 4)->nullable();
            $table->decimal('TreatmentTotalCost', 19, 4)->nullable();
            $table->dateTime('TreatmentDate')->nullable();
            $table->uuid('ProviderInchargeID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->boolean('IsArchived')->nullable()->default(false);
            $table->uuid('ParentPatientTreatmentDoneID')->nullable();
            $table->decimal('TreatmentAddition', 19, 4)->nullable()->default(0);
            $table->unsignedInteger('TreatmentPlanStatusID')->nullable()->comment('1:> Planned Treatment. 
2:> Confirmed Plan. 
3:> Rejected/Cancelled Plan. ');

            $table->primary(['PatientTreatmentPlanHeaderID'], 'pk_patienttreatmentsplanheader');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientTreatmentsPlanHeader');
    }
};
