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
        Schema::table('BankDeposits', function (Blueprint $table) {
            $table->foreign(['BankAccountID'], 'FK_BankDeposits_BankAccounts')->references(['BankAccountID'])->on('BankAccounts')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('BankDeposits', function (Blueprint $table) {
            $table->dropForeign('FK_BankDeposits_BankAccounts');
        });
    }
};
