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
        Schema::create('ECG_Config_Channel', function (Blueprint $table) {
            $table->uuid('ECGChannelID');
            $table->text('ClinicIDCSV')->nullable();
            $table->string('ChannelName', 50)->nullable();
            $table->text('ChannelDescription')->nullable();
            $table->unsignedInteger('ChannelTypeID')->nullable()->default(0)->comment('1:> ecgClinic+. 
2:> ecgDental+. 
3:> ecgHMS+. 
0:> All. 
');
            $table->dateTime('PublishFrom')->nullable();
            $table->dateTime('PublishTo')->nullable();
            $table->boolean('IsActive')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ECGChannelID'], 'pk_ecg_config_channel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_Config_Channel');
    }
};
