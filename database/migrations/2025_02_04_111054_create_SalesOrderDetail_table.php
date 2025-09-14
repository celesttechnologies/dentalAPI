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
        Schema::create('SalesOrderDetail', function (Blueprint $table) {
            $table->uuid('SalesOrderDetailId')->default('newid()');
            $table->uuid('SalesOrderHeaderId');
            $table->uuid('ItemID');
            $table->unsignedInteger('Qty')->nullable();
            $table->decimal('Rate', 19, 4)->nullable()->default(0);
            $table->decimal('Amount', 19, 4)->nullable()->default(0);
            $table->dateTime('ManufacturingDate')->nullable();
            $table->dateTime('ExpiryDate')->nullable();
            $table->string('BatchNumber', 50)->nullable();
            $table->dateTime('BatchDate')->nullable();

            $table->primary(['SalesOrderDetailId'], 'pk_salesorderdetail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SalesOrderDetail');
    }
};
