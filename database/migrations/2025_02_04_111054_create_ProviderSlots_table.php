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
        Schema::create('ProviderSlots', function (Blueprint $table) {
            $table->uuid('ProviderSlotID');
            $table->uuid('ProviderID');
            $table->dateTime('StartDatetime')->nullable();
            $table->dateTime('EndDateTime')->nullable();
            $table->unsignedInteger('SlotInterval')->nullable();
            $table->dateTime('CreatedOn');
            $table->string('CreatedBy', 50);
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->boolean('IsDeleted')->nullable()->default(false);

            $table->primary(['ProviderSlotID'], 'pk_providerslots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProviderSlots');
    }
};
