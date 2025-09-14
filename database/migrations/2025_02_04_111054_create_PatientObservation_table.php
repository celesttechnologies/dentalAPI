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
        Schema::create('PatientObservation', function (Blueprint $table) {
            $table->uuid('PatientObservationID');
            $table->uuid('PatientID');
            $table->unsignedInteger('TreatmentTypeID');
            $table->dateTime('DateOfHistroy')->nullable();
            $table->text('Description')->nullable();
            $table->text('TeethTreatments')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('ProviderID');
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientObservationID'], 'pk_patientobservation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientObservation');
    }
};
