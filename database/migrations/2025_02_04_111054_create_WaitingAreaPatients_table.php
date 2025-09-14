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
        Schema::create('WaitingAreaPatients', function (Blueprint $table) {
            $table->uuid('WaitingAreaID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('AppointmentID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->string('PatientName', 50)->nullable();
            $table->string('PatientPhone', 50)->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->string('ProviderName')->nullable();
            $table->dateTime('StartDateTime')->nullable();
            $table->dateTime('EndDateTime')->nullable();
            $table->text('Comments')->nullable();
            $table->string('Status', 50)->nullable();
            $table->dateTime('ReminderDate')->nullable();
            $table->dateTime('CancelledOn')->nullable();
            $table->string('CancelledBy', 50)->nullable();
            $table->string('CancellationReason')->nullable();
            $table->string('CancellationType')->nullable();
            $table->dateTime('ArrivalTime')->nullable();
            $table->dateTime('OperationTime')->nullable();
            $table->dateTime('CompleteTime')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('WaitTime', 50)->nullable();
            $table->uuid('ChairID')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable();
            $table->string('TokenNumber', 50)->nullable();
            $table->boolean('IsQueueNotificationSMSRequested')->nullable();
            $table->unsignedInteger('QueueNotificationCount')->nullable();

            $table->primary(['WaitingAreaID'], 'pk_waitingareapatients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('WaitingAreaPatients');
    }
};
