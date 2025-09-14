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
        Schema::table('ECG_Config_ChannelInformation', function (Blueprint $table) {
            $table->foreign(['ECGChannelID'], 'FK_ECG_Config_ChannelInformation_ECG_Config_Channel')->references(['ECGChannelID'])->on('ECG_Config_Channel')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ECG_Config_ChannelInformation', function (Blueprint $table) {
            $table->dropForeign('FK_ECG_Config_ChannelInformation_ECG_Config_Channel');
        });
    }
};
