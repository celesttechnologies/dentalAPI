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
        Schema::create('BankAccounts', function (Blueprint $table) {
            $table->uuid('BankAccountID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->text('BankAccountName')->nullable();
            $table->string('AccountNumber')->nullable();
            $table->string('Branch')->nullable();
            $table->string('City', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['BankAccountID'], 'pk_bankaccounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BankAccounts');
    }
};
