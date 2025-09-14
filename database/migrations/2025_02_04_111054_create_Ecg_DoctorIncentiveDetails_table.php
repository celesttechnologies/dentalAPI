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
        Schema::create('Ecg_DoctorIncentiveDetails', function (Blueprint $table) {
            $table->uuid('IncetiveDetailId');
            $table->uuid('IncetiveId');
            $table->uuid('PatientTreatmentDoneID');
            $table->decimal('TreatmentTotalCost', 19, 4)->nullable();
            $table->decimal('IncentiveAmount', 19, 4)->nullable();
            $table->unsignedInteger('IncentiveType')->nullable();
            $table->decimal('IncentiveValue', 18, 0)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['IncetiveDetailId'], 'pk_ecg_doctorincentivedetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ecg_DoctorIncentiveDetails');
    }
};
