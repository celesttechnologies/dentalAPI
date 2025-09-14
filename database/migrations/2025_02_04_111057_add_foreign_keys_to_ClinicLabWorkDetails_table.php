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
        Schema::table('ClinicLabWorkDetails', function (Blueprint $table) {
            $table->foreign(['LabWorkID'], 'FK_ClinicLabWorkDetails_ClinicLabWork')->references(['LabWorkID'])->on('ClinicLabWork')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['LabWorkComponentID'], 'FK_ClinicLabWorkDetails_ClinicLabWorkComponents')->references(['LabWorkComponentID'])->on('ClinicLabWorkComponents')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ClinicLabWorkDetails', function (Blueprint $table) {
            $table->dropForeign('FK_ClinicLabWorkDetails_ClinicLabWork');
            $table->dropForeign('FK_ClinicLabWorkDetails_ClinicLabWorkComponents');
        });
    }
};
