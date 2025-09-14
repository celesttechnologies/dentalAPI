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
        Schema::create('ECG_M_TreatmentTypeHierarchy', function (Blueprint $table) {
            $table->uuid('TreatmentTypeID');
            $table->uuid('ClinicID');
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->uuid('ParentTreatmentTypeID')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable();
            $table->decimal('GeneralTreatmentCost', 19, 4)->nullable();
            $table->decimal('SpecialistTreatmentCost', 19, 4)->nullable();
            $table->unsignedInteger('TreatmentSpecialityTypeID')->nullable();

            $table->primary(['TreatmentTypeID', 'ClinicID'], 'pk_m_treatmenttypehierarchy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_M_TreatmentTypeHierarchy');
    }
};
