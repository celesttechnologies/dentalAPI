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
        Schema::create('Clinic_TV_ClinicRSSData', function (Blueprint $table) {
            $table->uuid('ClinicRSSID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('NewsTickerRSSMasterID')->nullable();
            $table->text('RSSURL')->nullable();
            $table->string('RSSTitle', 50)->nullable();
            $table->text('RSSDescription')->nullable();
            $table->text('RSSXML')->nullable();
            $table->text('RSSText')->nullable();
            $table->boolean('IsUserConfigurable')->nullable()->default(false);
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicRSSID'], 'pk_clinic_tv_clinicrssdata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clinic_TV_ClinicRSSData');
    }
};
