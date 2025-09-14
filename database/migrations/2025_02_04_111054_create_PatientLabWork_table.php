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
        Schema::create('PatientLabWork', function (Blueprint $table) {
            $table->uuid('PatientLabWorkID');
            $table->uuid('PatientLabID');
            $table->string('WorkPatternDR', 50)->nullable();
            $table->string('WorkPatternTec', 50)->nullable();
            $table->dateTime('WorkPatternDate')->nullable();
            $table->dateTime('WorkPatternTime')->nullable();
            $table->string('MetalWorkDR', 50)->nullable();
            $table->string('MetalWorkTec', 50)->nullable();
            $table->dateTime('MetalWorkDate')->nullable();
            $table->dateTime('MetalWorkTime')->nullable();
            $table->string('CeramicsDR', 50)->nullable();
            $table->string('CeramicsTec', 50)->nullable();
            $table->dateTime('CeramicsDate')->nullable();
            $table->dateTime('CeramicsTime')->nullable();
            $table->string('DentureDR', 50)->nullable();
            $table->string('DentureTec', 50)->nullable();
            $table->dateTime('DentureDate')->nullable();
            $table->dateTime('DentureTime')->nullable();

            $table->primary(['PatientLabWorkID'], 'pk_patientlabwork');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientLabWork');
    }
};
