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
        Schema::create('ECG_Clinic_RoleConfiguration', function (Blueprint $table) {
            $table->uuid('ClinicRoleID');
            $table->uuid('ClinicID');
            $table->uuid('RoleID');
            $table->text('LicenseModuleCodeCSV')->nullable();
            $table->boolean('IsAdministratorRole')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->unsignedInteger('DefaultImportance')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicRoleID'], 'pk_ecg_clinic_roleconfiguration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_Clinic_RoleConfiguration');
    }
};
