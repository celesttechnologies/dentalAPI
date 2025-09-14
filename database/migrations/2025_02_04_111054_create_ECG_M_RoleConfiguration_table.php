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
        Schema::create('ECG_M_RoleConfiguration', function (Blueprint $table) {
            $table->uuid('ClinicRoleID')->default('newid()');
            $table->uuid('RoleID');
            $table->text('LicenseModuleCodeCSV')->nullable();
            $table->boolean('IsAdministratorRole')->nullable()->default(false);
            $table->boolean('IsActive')->nullable()->default(true);
            $table->unsignedInteger('DefaultImportance')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicRoleID'], 'pk_ecg_m_roleconfiguration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_M_RoleConfiguration');
    }
};
