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
        Schema::create('PatientTreatmentsDone', function (Blueprint $table) {
            $table->uuid('PatientTreatmentDoneID');
            $table->uuid('PatientID');
            $table->uuid('ProviderID');
            $table->decimal('TreatmentCost', 19, 4)->nullable();
            $table->decimal('TreatmentDiscount', 19, 4)->nullable()->default(0);
            $table->decimal('TreatmentTax', 19, 4)->nullable();
            $table->decimal('TreatmentTotalCost', 19, 4)->nullable();
            $table->decimal('TreatmentPayment', 19, 4)->nullable();
            $table->decimal('TreatmentBalance', 19, 4)->nullable();
            $table->string('ModeofPayment', 50)->nullable();
            $table->string('ChequeNo', 50)->nullable();
            $table->dateTime('ChequeDate')->nullable();
            $table->string('BankName', 50)->nullable();
            $table->unsignedInteger('CreditCardBankID')->nullable();
            $table->string('CreditCardDigit', 4)->nullable();
            $table->text('CreditCardOwner')->nullable();
            $table->text('CreditCardValidFrom')->nullable();
            $table->text('CreditCardValidTo')->nullable();
            $table->dateTime('TreatmentDate')->nullable();
            $table->uuid('ProviderInchargeID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->dateTime('ReceiptDate')->nullable();
            $table->unsignedInteger('ReceiptNo')->nullable();
            $table->boolean('IsArchived')->nullable()->default(false);
            $table->uuid('ParentPatientTreatmentDoneID')->nullable();
            $table->decimal('TreatmentAddition', 18)->nullable()->default(0);
            $table->uuid('WaitingAreaID')->nullable();
            $table->decimal('AmountToBeCollected', 19, 4)->nullable();
            $table->text('TeethTreatmentNote')->nullable();
            $table->dateTime('ArchivedOn')->nullable();

            $table->primary(['PatientTreatmentDoneID'], 'pk_patienttreatmentsdone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientTreatmentsDone');
    }
};
