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
        Schema::create('Patient_Address', function (Blueprint $table) {
            $table->uuid('PatientAddressID')->default('newid()');
            $table->uuid('PatientID')->nullable();
            $table->unsignedInteger('AddressTypeID')->nullable()->default(1)->comment('1--> for Communication Address
2--> for Permanent Address');
            $table->string('AddressLine1')->nullable();
            $table->string('AddressLine2')->nullable();
            $table->string('Street')->nullable();
            $table->string('Area')->nullable();
            $table->string('City', 50)->nullable();
            $table->string('State', 50)->nullable();
            $table->unsignedInteger('Country')->nullable();
            $table->string('ZipCode', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['PatientAddressID'], 'pk_patient_addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Patient_Address');
    }
};
