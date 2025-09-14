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
        Schema::create('ClinicChairs', function (Blueprint $table) {
            $table->uuid('ChairID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->string('Title')->nullable();
            $table->text('Description')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->char('LastUpdatedBy', 100)->nullable();

            $table->primary(['ChairID'], 'pk_clinicchairs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicChairs');
    }
};
