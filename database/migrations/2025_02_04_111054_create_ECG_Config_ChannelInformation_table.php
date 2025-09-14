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
        Schema::create('ECG_Config_ChannelInformation', function (Blueprint $table) {
            $table->uuid('ChannelInformationID');
            $table->uuid('ECGChannelID')->nullable();
            $table->text('InformationTitle')->nullable();
            $table->text('TitleLink')->nullable();
            $table->string('TitleLinkTag', 50)->nullable();
            $table->text('Description')->nullable();
            $table->text('OtherLink')->nullable();
            $table->string('OtherLinkTag', 50)->nullable();
            $table->dateTime('PublishTill')->nullable();
            $table->boolean('IsActive')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ChannelInformationID'], 'pk_ecg_config_channelinformation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_Config_ChannelInformation');
    }
};
