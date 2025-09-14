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
        Schema::table('PatientSetting', function (Blueprint $table) {
            $table->foreign(['PatientTreatmentID'], 'FK_PatientSetting_PatientTreatments')->references(['PatientTreatmentID'])->on('PatientTreatments')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientSetting', function (Blueprint $table) {
            $table->dropForeign('FK_PatientSetting_PatientTreatments');
        });
    }
};
