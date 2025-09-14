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
        Schema::create('SalesOrderHeader', function (Blueprint $table) {
            $table->uuid('SalesOrderHeaderId')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->string('SalesOrderNo', 50);
            $table->dateTime('SalesOrderDate')->useCurrent();
            $table->uuid('ItemCustomerID');
            $table->string('InvoiceNo', 50)->nullable();
            $table->dateTime('InvoiceDate')->nullable()->useCurrent();
            $table->string('Naration', 50)->nullable();
            $table->dateTime('DespatchDate')->nullable();
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

            $table->primary(['SalesOrderHeaderId'], 'pk_salesorderheader');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SalesOrderHeader');
    }
};
