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
        Schema::create('ExpensesInOutDetail', function (Blueprint $table) {
            $table->uuid('ExpensesDetailID')->default('newid()');
            $table->uuid('ExpensesHeaderID')->nullable();
            $table->uuid('ExpensesTypeID');
            $table->text('OtherExpenses')->nullable();
            $table->decimal('Amount', 18);
            $table->string('PaidBy', 50)->nullable();

            $table->primary(['ExpensesDetailID'], 'pk_expensesinoutdetail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpensesInOutDetail');
    }
};
