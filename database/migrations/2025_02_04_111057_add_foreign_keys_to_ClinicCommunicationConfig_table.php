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
        Schema::table('ClinicCommunicationConfig', function (Blueprint $table) {
            $table->foreign(['ClinicID'], 'FK_Table_1_Clinic')->references(['ClinicID'])->on('Clinic')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ClinicCommunicationMasterID'], 'FK_Table_1_ClinicCommunicationMaster')->references(['ClinicCommunicationMasterID'])->on('ClinicCommunicationMaster')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ClinicCommunicationConfig', function (Blueprint $table) {
            $table->dropForeign('FK_Table_1_Clinic');
            $table->dropForeign('FK_Table_1_ClinicCommunicationMaster');
        });
    }
};
