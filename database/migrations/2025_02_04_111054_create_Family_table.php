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
        Schema::create('Family', function (Blueprint $table) {
            $table->uuid('FamilyID');
            $table->uuid('ClinicID')->nullable();
            $table->string('FamilyName', 1000)->nullable();
            $table->text('FamilyNotes')->nullable();
            $table->string('AddressLine1')->nullable();
            $table->string('AddressLine2')->nullable();
            $table->string('Street')->nullable();
            $table->string('Area')->nullable();
            $table->string('City', 50)->nullable();
            $table->string('State', 50)->nullable();
            $table->unsignedInteger('Country')->nullable();
            $table->string('ZipCode', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->unsignedInteger('FamilyNo');
            $table->string('FamilyCode', 10);

            $table->primary(['FamilyID'], 'pk_family');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Family');
    }
};
