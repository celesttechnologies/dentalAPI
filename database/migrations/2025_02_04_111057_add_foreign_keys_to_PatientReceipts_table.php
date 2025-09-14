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
        Schema::table('PatientReceipts', function (Blueprint $table) {
            $table->foreign(['PatientID'], 'FK_PatientReceipts_Patient')->references(['PatientID'])->on('Patient')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['PatientTreatmentDoneId'], 'FK_PatientReceipts_PatientTreatmentsDone')->references(['PatientTreatmentDoneID'])->on('PatientTreatmentsDone')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientReceipts', function (Blueprint $table) {
            $table->dropForeign('FK_PatientReceipts_Patient');
            $table->dropForeign('FK_PatientReceipts_PatientTreatmentsDone');
        });
    }
};
