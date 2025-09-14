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
        Schema::create('ItemStock', function (Blueprint $table) {
            $table->increments('ItemStockId');
            $table->uuid('ItemId');
            $table->unsignedInteger('Quantity');
            $table->uuid('ClinicID')->nullable();

            $table->primary(['ItemStockId'], 'pk_itemstock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ItemStock');
    }
};
