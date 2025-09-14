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
        Schema::create('Appointments', function (Blueprint $table) {
            $table->uuid('AppointmentID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->uuid('ProviderID');
            $table->dateTime('StartDateTime')->nullable();
            $table->dateTime('EndDateTime')->nullable();
            $table->text('Comments')->nullable();
            $table->string('Status', 50)->nullable();
            $table->dateTime('ReminderDate')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('CancelledOn')->nullable();
            $table->string('CancelledBy', 50)->nullable();
            $table->string('CancellationReason')->nullable();
            $table->string('CancellationType')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->string('PatientName', 50)->nullable();
            $table->string('PatientPhone', 50)->nullable();
            $table->string('ArrivalTime', 50)->nullable();
            $table->string('CompleteTime', 50)->nullable();
            $table->string('OperationTime', 50)->nullable();
            $table->string('WaitTime', 50)->nullable();
            $table->uuid('ChairID')->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->string('PatientTitle', 50)->nullable();
            $table->string('PatientFirstName', 50)->nullable();
            $table->string('PatientLastName', 50)->nullable();
            $table->string('PatientGender', 1)->nullable();
            $table->unsignedInteger('PatientAge')->nullable();
            $table->string('PatientNationality', 50)->nullable();
            $table->boolean('IsAllDay')->nullable()->default(false);

            $table->primary(['AppointmentID'], 'pk_appointments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Appointments');
    }
};
