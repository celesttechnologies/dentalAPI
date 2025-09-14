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
        Schema::table('PatientDentalHistoryAttribute', function (Blueprint $table) {
            $table->foreign(['PatientID'], 'FK_PatientDentalHistoryAttributes_Patient')->references(['PatientID'])->on('Patient')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientDentalHistoryAttribute', function (Blueprint $table) {
            $table->dropForeign('FK_PatientDentalHistoryAttributes_Patient');
        });
    }
};
