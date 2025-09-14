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
        Schema::create('ExpensesInOutHeader', function (Blueprint $table) {
            $table->uuid('ExpensesHeaderID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->string('ExpenseCategory', 500);
            $table->unsignedInteger('NoOfExpenseItems');
            $table->decimal('TotalAmount', 18);
            $table->dateTime('ExpenseDate');
            $table->string('CreatedBy', 200);
            $table->dateTime('CreatedOn');
            $table->string('LastUpdatedBy', 200);
            $table->dateTime('LastUpdatedOn');
            $table->text('Comments');
            $table->boolean('IsDeleted');
            $table->uuid('rowguid')->default('newid()');

            $table->primary(['ExpensesHeaderID'], 'pk_expensesinoutheader_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpensesInOutHeader');
    }
};
