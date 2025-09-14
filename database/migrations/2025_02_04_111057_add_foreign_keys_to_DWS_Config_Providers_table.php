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
        Schema::table('DWS_Config_Providers', function (Blueprint $table) {
            $table->foreign(['ClinicWebSiteID'], 'FK_DWS_Config_Providers_DWS_Config_Websites')->references(['ClinicWebSiteID'])->on('DWS_Config_Websites')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DWS_Config_Providers', function (Blueprint $table) {
            $table->dropForeign('FK_DWS_Config_Providers_DWS_Config_Websites');
        });
    }
};
