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
        Schema::create('EmailSituations', function (Blueprint $table) {
            $table->uuid('EmailSituationID')->default('newid()');
            $table->string('SitutationCode', 50)->nullable();
            $table->text('SituationDescription')->nullable();
            $table->text('DetailedTrigerringDeescription')->nullable();
            $table->string('SituationType', 50)->nullable();
            $table->string('DependentField1', 50)->nullable();
            $table->string('DependentField2', 50)->nullable();
            $table->string('DependentField3', 50)->nullable();
            $table->string('DependentField4', 50)->nullable();
            $table->string('IsActive', 50)->nullable();
            $table->boolean('isDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['EmailSituationID'], 'pk_emailsituations_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EmailSituations');
    }
};
