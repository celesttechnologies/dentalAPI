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
        Schema::create('PatientDentalHistory', function (Blueprint $table) {
            $table->uuid('PatientDentalHistoryID')->default('newid()');
            $table->uuid('PatientID');
            $table->uuid('TreatmentTypeID');
            $table->text('Notes')->nullable();
            $table->text('TeethTreatments')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->default('newid()');

            $table->primary(['PatientDentalHistoryID'], 'pk_patientdentalhistory');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDentalHistory');
    }
};
