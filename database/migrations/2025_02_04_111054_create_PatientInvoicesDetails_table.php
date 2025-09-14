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
        Schema::create('PatientInvoicesDetails', function (Blueprint $table) {
            $table->uuid('InvoiceDetailID')->default('newid()');
            $table->uuid('InvoiceID')->nullable();
            $table->uuid('PatientTreatmentDoneID')->nullable();
            $table->dateTime('TreatmentDate')->nullable();
            $table->text('TreatmentSummary')->nullable();
            $table->decimal('TreatmentCost', 18)->nullable();
            $table->decimal('TreatmentAddition', 18)->nullable();
            $table->decimal('TreatmentDiscount', 18)->nullable();
            $table->decimal('TreatmentTax', 18)->nullable();
            $table->decimal('TreatmentTotalCost', 18)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['InvoiceDetailID'], 'pk_patientinvoicesdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientInvoicesDetails');
    }
};
