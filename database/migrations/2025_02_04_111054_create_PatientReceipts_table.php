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
        Schema::create('PatientReceipts', function (Blueprint $table) {
            $table->uuid('ReceiptID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('ReceiptNo');
            $table->string('ReceiptNumber', 50);
            $table->unsignedInteger('ManualReceiptNo')->nullable();
            $table->string('ReceiptCodePrefix', 150)->nullable();
            $table->uuid('InvoiceID')->nullable();
            $table->dateTime('ReceiptDate')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->uuid('PatientTreatmentDoneId')->nullable();
            $table->decimal('TreatmentPayment', 19, 4)->nullable();
            $table->decimal('InvoicedAmount', 19, 4)->nullable();
            $table->decimal('BalanceAmount', 19, 4)->nullable();
            $table->string('ModeofPayment', 50)->nullable();
            $table->string('ChequeNo', 50)->nullable();
            $table->dateTime('ChequeDate')->nullable();
            $table->string('BankName')->nullable();
            $table->unsignedInteger('CreditCardBankID')->nullable();
            $table->string('CreditCardDigit', 50)->nullable();
            $table->string('CreditCardOwner', 50)->nullable();
            $table->string('CreditCardValidFrom', 50)->nullable();
            $table->string('CreditCardValidTo', 50)->nullable();
            $table->text('PaymentNotes')->nullable();
            $table->boolean('IsCancelled')->nullable()->default(false);
            $table->text('CancellationNotes')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->uuid('WaitingAreaID')->nullable();
            $table->text('InsuranceName')->nullable();
            $table->string('PolicyNumber', 50)->nullable();
            $table->text('PolicyNotes')->nullable();
            $table->text('ReceiptNotes')->nullable();

            $table->primary(['ReceiptID'], 'pk_patientreceipts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientReceipts');
    }
};
