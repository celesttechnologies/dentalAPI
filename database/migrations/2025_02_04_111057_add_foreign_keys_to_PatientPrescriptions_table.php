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
        Schema::table('PatientPrescriptions', function (Blueprint $table) {
            // $table->foreign(['PatientID'], 'FK_PatientPrescriptions_Patient')->references(['PatientID'])->on('Patient')->onUpdate('no action')->onDelete('no action');
            // $table->foreign(['PatientPrescriptionID'], 'FK_PatientPrescriptions_PatientPrescriptions')->references(['PatientPrescriptionID'])->on('PatientPrescriptions')->onUpdate('no action')->onDelete('no action');
            // $table->foreign(['PatientPrescriptionID'], 'FK_PatientPrescriptions_PatientPrescriptions1')->references(['PatientPrescriptionID'])->on('PatientPrescriptions')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientPrescriptions', function (Blueprint $table) {
            // $table->dropForeign('FK_PatientPrescriptions_Patient');
            // $table->dropForeign('FK_PatientPrescriptions_PatientPrescriptions');
            // $table->dropForeign('FK_PatientPrescriptions_PatientPrescriptions1');
        });
    }
};
