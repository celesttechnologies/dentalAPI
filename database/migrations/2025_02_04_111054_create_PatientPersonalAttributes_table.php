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
        Schema::create('PatientPersonalAttributes', function (Blueprint $table) {
            $table->uuid('PatientAttributeDataID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->uuid('PatientAttributeID')->nullable();
            $table->text('PatientAttributeData')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();

            $table->primary(['PatientAttributeDataID'], 'pk_patientpersonalattributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientPersonalAttributes');
    }
};
