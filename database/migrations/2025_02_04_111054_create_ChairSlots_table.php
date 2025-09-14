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
        Schema::create('ChairSlots', function (Blueprint $table) {
            $table->uuid('ChairSlotID')->default('newid()');
            $table->uuid('ChairID');
            $table->dateTime('StartDatetime')->nullable();
            $table->dateTime('EndDateTime')->nullable();
            $table->unsignedInteger('SlotInterval')->nullable();
            $table->dateTime('CreatedOn');
            $table->string('CreatedBy', 50);
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ChairSlotID'], 'pk_chairslots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChairSlots');
    }
};
