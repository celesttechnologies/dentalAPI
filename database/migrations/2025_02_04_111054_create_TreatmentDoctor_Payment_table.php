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
        Schema::create('TreatmentDoctor_Payment', function (Blueprint $table) {
            $table->uuid('TreatmentPaymentId');
            $table->uuid('TreatmentDoneId');
            $table->uuid('ProviderId');
            $table->decimal('Amount', 19, 4)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);

            $table->primary(['TreatmentPaymentId'], 'pk_treatmentdoctor_payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TreatmentDoctor_Payment');
    }
};
