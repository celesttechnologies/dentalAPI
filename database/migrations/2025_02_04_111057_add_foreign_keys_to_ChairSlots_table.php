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
        Schema::table('ChairSlots', function (Blueprint $table) {
            $table->foreign(['ChairID'], 'FK_ChairSlots_ClinicChairs')->references(['ChairID'])->on('ClinicChairs')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ChairSlots', function (Blueprint $table) {
            $table->dropForeign('FK_ChairSlots_ClinicChairs');
        });
    }
};
