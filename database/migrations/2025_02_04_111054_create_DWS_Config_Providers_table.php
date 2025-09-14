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
        Schema::create('DWS_Config_Providers', function (Blueprint $table) {
            $table->uuid('ProviderWebsiteID')->default('newid()');
            $table->uuid('ClinicWebSiteID')->nullable();
            $table->uuid('ProviderID')->nullable()->default('newid()');
            $table->string('ProviderName')->nullable();
            $table->text('ProviderDescription')->nullable();
            $table->string('ProviderContactNumber')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ProviderWebsiteID'], 'pk_dws_config_providers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Config_Providers');
    }
};
