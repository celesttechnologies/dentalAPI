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
        Schema::create('DWS_Config_ClinicTimings', function (Blueprint $table) {
            $table->uuid('ClinicTimingID')->default('newid()');
            $table->uuid('ClinicWebSiteID')->nullable();
            $table->unsignedInteger('DayID')->nullable();
            $table->string('DayofWeek', 50)->nullable();
            $table->text('TimingsText')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicTimingID'], 'pk_dws_config_clinictimings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Config_ClinicTimings');
    }
};
