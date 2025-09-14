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
        Schema::create('SMSTransactions', function (Blueprint $table) {
            $table->uuid('SMSTransactionID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('ReferenceCode')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->unsignedInteger('SMSTypeID')->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->text('MessageText')->nullable();
            $table->dateTime('ScheduledOn')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->boolean('SentStatus')->nullable()->default(false);
            $table->dateTime('SentOn')->nullable();
            $table->text('SentStatusMessage')->nullable();
            $table->boolean('IsPromotional')->nullable()->default(false);

            $table->primary(['SMSTransactionID'], 'pk_smstransactions');

//             ->comment('RoutineSMS_AUTO_DaysReminder1-5=1-5
// RoutineSMS_AUTO_IncompleteTreatmentReminder=6,
// AppointmentSMS_AUTO_PatientMorning=7,
// AppointmentSMS_AUTO_PatientNight=8,
// AppointmentSMS_AUTO_PatientHoursBefore=9,
// AppointmentSMS_AUTO_DoctorTodaySchedule=10,
// AppointmentSMS_MANUAL_Patient_Doctor_NewApt=11,
// AppointmentSMS_MANUAL_PatientNewApt=12,
// AppointmentSMS_MANUAL_DoctorNewApt=13,
// AppointmentSMS_MANUAL_Patient_Doctor_ReScheduleApt=14,
// AppointmentSMS_MANUAL_PatientReScheduleApt=15,
// AppointmentSMS_MANUAL_DoctorReScheduleApt=16,
// AppointmentSMS_MANUAL_Patient_Doctor_CancelApt=17,
// AppointmentSMS_MANUAL_PatientCancelApt=18,
// AppointmentSMS_MANUAL_DoctorCancelApt=19,
// WaitingAreaSMS_MANUAL_TokenNumber=20,
// WaitingAreaSMS_AUTO_QueueCountNotification=21,
// WaitingAreaSMS_AUTO_CheckOutThankYou=22,
// PrescriptionSMS_MANUAL_Details=23,
// PaymentSMS_AUTO_OutstandingDuration_Reminder1=24,
// PaymentSMS_AUTO_OutstandingDuration_Reminder2=25,
// PaymentSMS_AUTO_OutstandingDuration_Reminder3=26,
// PaymentSMS_AUTO_Recieved=27,
// EcgTRAISMS_MANUAL_OptInSubscriber=28,
// EcgTRAISMS_MANUAL_OptOutSubscriber=29,
// SubscriberSMS_AUTO_Moring=30,
// SubscriberSMS_AUTO_Night=31,
// UserSMS_Custom=32')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SMSTransactions');
    }
};
