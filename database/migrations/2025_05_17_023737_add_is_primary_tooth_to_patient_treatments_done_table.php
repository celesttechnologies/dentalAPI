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
        Schema::table('PatientTreatmentsDone', function (Blueprint $table) {
            $table->boolean('isPrimaryTooth')->default(false)->after('TeethTreatmentNote');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PatientTreatmentsDone', function (Blueprint $table) {
            $table->dropColumn('isPrimaryTooth');
        });
    }
};
