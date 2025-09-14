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
        Schema::create('DWS_Config_Services', function (Blueprint $table) {
            $table->uuid('ServiceID')->default('newid()');
            $table->uuid('ClinicWebSiteID')->nullable();
            $table->text('ServiceName')->nullable();
            $table->text('ServiceDescription')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ServiceID'], 'pk_dws_config_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Config_Services');
    }
};
