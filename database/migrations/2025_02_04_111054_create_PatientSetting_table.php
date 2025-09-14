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
        Schema::create('PatientSetting', function (Blueprint $table) {
            $table->uuid('PatientSettingID');
            $table->uuid('PatientTreatmentID');
            $table->string('Setting', 50);
            $table->dateTime('SettingDate');
            $table->uuid('ProviderID');
            $table->uuid('ProviderInchargeID')->nullable();
            $table->unsignedInteger('WorkDone')->nullable();
            $table->boolean('ReqLabWork')->nullable();
            $table->text('SettingNote')->nullable();
            $table->decimal('EstimatedCost', 19, 4);
            $table->string('ModeOfPayment', 50)->nullable();
            $table->decimal('AmountPaid', 19, 4)->nullable()->default(0);
            $table->decimal('BalanceAmount', 19, 4)->nullable();
            $table->decimal('AvailableBalance', 19, 4)->nullable();
            $table->string('ChequeNo', 50)->nullable();
            $table->dateTime('ChequeDate')->nullable();
            $table->string('BankName', 50)->nullable();
            $table->unsignedInteger('CreditCardBankID')->nullable();
            $table->string('CreditCardDigit', 4)->nullable();
            $table->string('CreditCardOwner', 50)->nullable();
            $table->string('CreditCardValidFrom', 50)->nullable();
            $table->string('CreditCardValidTo', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('AddedOn')->nullable()->useCurrent();
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->unsignedInteger('SettingID');
            $table->unsignedInteger('ID')->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['PatientSettingID'], 'pk_patientsetting');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientSetting');
    }
};
