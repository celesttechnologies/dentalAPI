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
        Schema::table('ClinicLabWork', function (Blueprint $table) {
            $table->foreign(['ClinicID'], 'FK_ClinicLabWork_Clinic')->references(['ClinicID'])->on('Clinic')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['PatientID'], 'FK_ClinicLabWork_Patient')->references(['PatientID'])->on('Patient')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ClinicLabWork', function (Blueprint $table) {
            $table->dropForeign('FK_ClinicLabWork_Clinic');
            $table->dropForeign('FK_ClinicLabWork_Patient');
        });
    }
};
