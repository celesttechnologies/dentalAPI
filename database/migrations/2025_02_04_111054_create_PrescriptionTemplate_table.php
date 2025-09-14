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
        Schema::create('PrescriptionTemplate', function (Blueprint $table) {
            $table->uuid('PrescriptionTemplateID');
            $table->uuid('ClinicId');
            $table->text('TemplateName')->nullable();
            $table->uuid('MedicineId')->nullable();
            $table->text('MedicineName')->nullable();
            $table->unsignedInteger('FrequencyId')->nullable();
            $table->string('Dosage', 250)->nullable();
            $table->string('Duration', 250)->nullable();
            $table->text('DrugNote')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('PrescriptionTemplateMasterID')->nullable();
            $table->string('Frequency', 250)->nullable();
            $table->unsignedInteger('SequenceOrder')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PrescriptionTemplate');
    }
};
