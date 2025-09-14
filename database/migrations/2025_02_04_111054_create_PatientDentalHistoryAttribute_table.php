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
        Schema::create('PatientDentalHistoryAttribute', function (Blueprint $table) {
            $table->uuid('PatientDentalHistoryAttributeID')->default('newid()');
            $table->uuid('PatientID');
            $table->string('DentalHistoryAttributesCategory', 50);
            $table->unsignedInteger('DentalHistoryAttributeID');
            $table->string('DentalHistoryAttributeValue', 50)->nullable();
            $table->text('DentalHistoryAttributeText')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['PatientDentalHistoryAttributeID'], 'pk_patientdentalhistoryattributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDentalHistoryAttribute');
    }
};
