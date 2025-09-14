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
        Schema::create('Ecg_DoctorIncentive', function (Blueprint $table) {
            $table->uuid('IncetiveId');
            $table->uuid('ClinicId')->nullable();
            $table->uuid('ProviderId')->nullable();
            $table->string('Month', 50)->nullable();
            $table->unsignedInteger('Year')->nullable();
            $table->decimal('TotalIncentiveAmount', 19, 4)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['IncetiveId'], 'pk_ecg_doctorincentive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ecg_DoctorIncentive');
    }
};
