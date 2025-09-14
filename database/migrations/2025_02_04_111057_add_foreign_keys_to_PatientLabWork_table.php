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
        Schema::table('PatientLabWork', function (Blueprint $table) {
            $table->foreign(['PatientLabID'], 'FK_PatientLabWork_PatientLab')->references(['PatientLabID'])->on('PatientLab')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientLabWork', function (Blueprint $table) {
            $table->dropForeign('FK_PatientLabWork_PatientLab');
        });
    }
};
