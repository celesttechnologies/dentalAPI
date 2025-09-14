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
        Schema::table('TreatmentDoctor_Payment', function (Blueprint $table) {
            $table->foreign(['TreatmentDoneId'], 'FK_TreatmentDoctor_Payment_PatientTreatmentsDone')->references(['PatientTreatmentDoneID'])->on('PatientTreatmentsDone')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('TreatmentDoctor_Payment', function (Blueprint $table) {
            $table->dropForeign('FK_TreatmentDoctor_Payment_PatientTreatmentsDone');
        });
    }
};
