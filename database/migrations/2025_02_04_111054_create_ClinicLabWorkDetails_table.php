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
        Schema::create('ClinicLabWorkDetails', function (Blueprint $table) {
            $table->uuid('LabWorkDetailID');
            $table->uuid('LabWorkID');
            $table->uuid('LabWorkComponentID')->nullable();
            $table->text('SelectedTeeth')->nullable();
            $table->decimal('LabWorkComponentCost', 18)->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('lastUpdatedBy', 50)->nullable();

            $table->primary(['LabWorkDetailID'], 'pk_cliniclabworkdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicLabWorkDetails');
    }
};
