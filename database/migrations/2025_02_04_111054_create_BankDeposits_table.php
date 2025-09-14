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
        Schema::create('BankDeposits', function (Blueprint $table) {
            $table->uuid('BankDepositID')->default('newid()');
            $table->dateTime('Date')->nullable()->useCurrent();
            $table->uuid('BankAccountID');
            $table->decimal('Amount', 19, 4)->nullable();
            $table->text('Comments')->nullable();
            $table->string('TransactionID', 50)->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->boolean('IsDeleted')->default(false);
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['BankDepositID'], 'pk_bankdeposits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BankDeposits');
    }
};
