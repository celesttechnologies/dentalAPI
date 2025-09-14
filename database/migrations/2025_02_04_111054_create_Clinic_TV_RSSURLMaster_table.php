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
        Schema::create('Clinic_TV_RSSURLMaster', function (Blueprint $table) {
            $table->uuid('NewsTickerRSSMasterID')->default('newid()');
            $table->text('RSSTitle')->nullable();
            $table->text('RSSDescription')->nullable();
            $table->text('RSSURL')->nullable();
            $table->text('RSSXML')->nullable();
            $table->boolean('IsUserConfigurable')->nullable()->default(false);
            $table->boolean('IsOnlineFeed')->nullable()->default(false);
            $table->boolean('IsAutoSync')->nullable()->default(false);
            $table->unsignedInteger('SyncFrequency')->nullable()->default(0);
            $table->dateTime('LastSyncTime')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['NewsTickerRSSMasterID'], 'pk_clinictvrssurl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clinic_TV_RSSURLMaster');
    }
};
