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
        Schema::create('PatientReceiptsDetails', function (Blueprint $table) {
            $table->uuid('ReceiptDetailID')->default('newid()');
            $table->uuid('ReceiptID')->nullable();
            $table->uuid('InvoiceID')->nullable();
            $table->uuid('PatientTreatmentDoneID')->nullable();
            $table->decimal('AmountPaid', 18)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ReceiptDetailID'], 'pk_patientreceiptdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientReceiptsDetails');
    }
};
