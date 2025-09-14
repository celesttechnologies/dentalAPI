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
        Schema::create('PurchaseOrderHeader', function (Blueprint $table) {
            $table->uuid('PurchaseOrderHeaderId')->default('newid()');
            $table->uuid('ClinicID');
            $table->string('PurchaseOrderNo', 50);
            $table->dateTime('PurchaseOrderDate')->useCurrent();
            $table->uuid('ItemSupplierID');
            $table->string('InvoiceNo', 50)->nullable();
            $table->dateTime('InvoiceDate')->nullable()->useCurrent();
            $table->string('Naration', 50)->nullable();
            $table->dateTime('ArrivalDate')->nullable();
            $table->decimal('Total', 19, 4)->default(0);
            $table->decimal('Tax', 19, 4)->default(0);
            $table->decimal('OtherExp', 19, 4)->nullable();
            $table->decimal('Discount', 19, 4)->default(0);
            $table->decimal('GrandTotal', 19, 4)->default(0);
            $table->decimal('PaidAmt', 19, 4)->default(0);
            $table->decimal('BalanceAmt', 19, 4)->default(0);
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreateBy', 50)->nullable();
            $table->dateTime('CreateOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->decimal('LessAmt', 19, 4)->nullable()->default(0);
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PurchaseOrderHeaderId'], 'pk_purchaseorderheader');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PurchaseOrderHeader');
    }
};
