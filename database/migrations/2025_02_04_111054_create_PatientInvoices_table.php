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
        Schema::create('PatientInvoices', function (Blueprint $table) {
            $table->uuid('InvoiceID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('InvoiceNo');
            $table->string('InvoiceNumber', 50);
            $table->unsignedInteger('ManualInvoiceNo')->nullable();
            $table->string('InvoiceCodePrefix', 150)->nullable();
            $table->dateTime('InvoiceDate')->nullable()->useCurrent();
            $table->uuid('PatientID')->nullable();
            $table->uuid('PatientTreatmentDoneID')->nullable();
            $table->decimal('TreatmentCost', 19, 4)->nullable();
            $table->decimal('TreatmentAddition', 19, 4)->nullable();
            $table->decimal('TreatmentDiscount', 19, 4)->nullable();
            $table->decimal('TreatmentTax', 19, 4)->nullable();
            $table->decimal('TreatmentTotalCost', 19, 4)->nullable();
            $table->decimal('TreatmentTotalPayment', 19, 4)->nullable();
            $table->decimal('TreatmentBalance', 19, 4)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->boolean('IsCancelled')->nullable()->default(false);
            $table->text('CancellationNotes')->nullable();
            $table->unsignedInteger('Status')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->text('Notes')->nullable();

            $table->primary(['InvoiceID'], 'pk_patientinvoices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientInvoices');
    }
};
