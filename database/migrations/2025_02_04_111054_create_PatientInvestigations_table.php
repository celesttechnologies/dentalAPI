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
        Schema::create('PatientInvestigations', function (Blueprint $table) {
            $table->uuid('PatientInvestigationID')->default('newid()');
            $table->uuid('PatientID')->nullable();
            $table->dateTime('DateOfInvestigation')->nullable()->useCurrent();
            $table->string('Weight')->nullable();
            $table->string('BloodPressure')->nullable();
            $table->string('FBS')->nullable();
            $table->string('PLBS')->nullable();
            $table->string('HbAC')->nullable();
            $table->string('LDL')->nullable();
            $table->string('ACR')->nullable();
            $table->string('Retina')->nullable();
            $table->text('Urine')->nullable();
            $table->text('Others')->nullable();
            $table->text('Custom1')->nullable();
            $table->text('Custom2')->nullable();
            $table->text('Custom3')->nullable();
            $table->text('Custom4')->nullable();
            $table->text('Custom5')->nullable();
            $table->text('Custom6')->nullable();
            $table->text('Custom7')->nullable();
            $table->text('Custom8')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientInvestigationID'], 'pk_patientinvestigations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientInvestigations');
    }
};
