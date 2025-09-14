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
        Schema::create('PatientHistroy', function (Blueprint $table) {
            $table->uuid('PatientHistroyID');
            $table->uuid('PatientID');
            $table->uuid('PatientDiagnosisID')->nullable();
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

            $table->primary(['PatientHistroyID'], 'pk_patienthistroy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientHistroy');
    }
};
