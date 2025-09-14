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
        Schema::table('SalesOrderDetail', function (Blueprint $table) {
            $table->foreign(['SalesOrderHeaderId'], 'FK_SalesOrderDetail_SalesOrderHeader')->references(['SalesOrderHeaderId'])->on('SalesOrderHeader')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SalesOrderDetail', function (Blueprint $table) {
            $table->dropForeign('FK_SalesOrderDetail_SalesOrderHeader');
        });
    }
};
