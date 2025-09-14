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
        Schema::create('WhatsappSMSTransactions', function (Blueprint $table) {
            $table->uuid('WhatsappSMSTransactionID');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->text('MessageText')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->boolean('SentStatus')->nullable();
            $table->dateTime('SentOn')->nullable();
            $table->text('SentStatusMessage')->nullable();
            $table->text('SMSSituation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('WhatsappSMSTransactions');
    }
};
