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
        Schema::table('SalesOrderHeader', function (Blueprint $table) {
            $table->foreign(['ItemCustomerID'], 'FK_SalesOrderHeader_ItemCustomer')->references(['ItemCustomerID'])->on('ItemCustomers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SalesOrderHeader', function (Blueprint $table) {
            $table->dropForeign('FK_SalesOrderHeader_ItemCustomer');
        });
    }
};
