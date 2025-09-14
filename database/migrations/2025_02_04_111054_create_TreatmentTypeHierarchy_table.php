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
        Schema::create('TreatmentTypeHierarchy', function (Blueprint $table) {
            $table->uuid('TreatmentTypeID')->default('newid()');
            $table->uuid('ClinicID');
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->uuid('ParentTreatmentTypeID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->decimal('GeneralTreatmentCost', 19, 4)->nullable();
            $table->decimal('SpecialistTreatmentCost', 19, 4)->nullable();
            $table->unsignedInteger('TreatmentSpecialityTypeID')->nullable()->default(1);

            $table->primary(['TreatmentTypeID', 'ClinicID'], 'pk_treatmenttypehierarchy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TreatmentTypeHierarchy');
    }
};
