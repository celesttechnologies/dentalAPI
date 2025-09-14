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
        Schema::create('Ecg_ExternalRefferalData', function (Blueprint $table) {
            $table->uuid('ExternalRefferalDataId');
            $table->uuid('ExternalRefferalMasterId');
            $table->uuid('PatientId')->nullable();
            $table->uuid('ClinicId')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ExternalRefferalDataId'], 'pk_ecg_externalrefferaldata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ecg_ExternalRefferalData');
    }
};
