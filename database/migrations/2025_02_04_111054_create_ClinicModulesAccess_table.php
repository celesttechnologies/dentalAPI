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
        Schema::create('ClinicModulesAccess', function (Blueprint $table) {
            $table->uuid('ClinicModuleAccessID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('LicenseModuleID')->nullable();
            $table->string('ModuleCode', 50)->nullable();
            $table->boolean('IsLicensed')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['ClinicModuleAccessID'], 'pk_clinicmodulesaccess');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicModulesAccess');
    }
};
