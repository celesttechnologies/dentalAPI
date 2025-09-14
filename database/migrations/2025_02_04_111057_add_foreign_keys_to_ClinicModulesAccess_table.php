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
        Schema::table('ClinicModulesAccess', function (Blueprint $table) {
            $table->foreign(['LicenseModuleID'], 'FK_ClinicModulesAccess_LicenseModules')->references(['LicenseModuleID'])->on('LicenseModules')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ClinicModulesAccess', function (Blueprint $table) {
            $table->dropForeign('FK_ClinicModulesAccess_LicenseModules');
        });
    }
};
