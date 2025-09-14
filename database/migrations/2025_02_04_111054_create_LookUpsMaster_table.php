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
        Schema::create('LookUpsMaster', function (Blueprint $table) {
            $table->uuid('LookUpMasterID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->string('ItemCategory', 50)->nullable();
            $table->string('ItemCategoryDescription', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->unsignedInteger('Importance')->nullable()->default(0);
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();

            $table->primary(['LookUpMasterID'], 'pk_lookupmaster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LookUpsMaster');
    }
};
