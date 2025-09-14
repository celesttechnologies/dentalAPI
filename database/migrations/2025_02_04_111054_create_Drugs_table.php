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
        Schema::create('Drugs', function (Blueprint $table) {
            $table->uuid('DrugId');
            $table->uuid('ClinicID')->nullable();
            $table->string('GenericName', 100);
            $table->string('Contraindications', 500)->nullable();
            $table->string('Interactions', 500)->nullable();
            $table->string('AdverseEffects', 500)->nullable();
            $table->string('OverdozeManagement', 500)->nullable();
            $table->string('Precautions', 500)->nullable();
            $table->string('PatientAlerts', 200)->nullable();
            $table->string('OtherInfo', 500)->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->boolean('IsDeleted')->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['DrugId'], 'pk_drugs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Drugs');
    }
};
