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
        Schema::create('LookUps', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('ItemID');
            $table->string('ItemTitle');
            $table->string('ItemDescription')->nullable();
            $table->string('ItemCategory', 50);
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->unsignedInteger('Importance')->default(0);
            $table->string('LastUpdatedBy', 50);
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['id'], 'pk_lookups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LookUps');
    }
};
