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
        Schema::create('LicenseModules', function (Blueprint $table) {
            $table->uuid('LicenseModuleID')->default('newid()');
            $table->string('ModuleCode', 50)->nullable();
            $table->string('ModuleName')->nullable();
            $table->text('ModuleDescription')->nullable();
            $table->unsignedInteger('OrderNumber')->nullable();
            $table->text('PreRequisitesCSV')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();

            $table->primary(['LicenseModuleID'], 'pk_licensemodules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LicenseModules');
    }
};
