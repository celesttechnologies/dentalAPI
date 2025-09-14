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
        Schema::create('Ecg_Activity_Events', function (Blueprint $table) {
            $table->uuid('EventActivityID');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->unsignedInteger('EventTypeID')->nullable()->comment('1 - Patient, 2 - PatientTreatmentsDone, 3 - PatientInvoices , 4 - PatientReceipts , 5 - ExaminationChart , 6 - PatientExamination , 7 - PatientPrescriptions  , 8 - PatientTreatmentsPlanHeader , 9 - PatientDOC_Files , 10 - ClinicLabWork , 11 - Ecg_PeriodontalChart ,12 - Examination Chart , 13 - PatientConsentDetails ,14 -PatientNotes
');
            $table->uuid('EventRelatedID')->nullable();
            $table->string('EventTypeName', 250)->nullable();
            $table->text('EventDetails')->nullable();
            $table->string('DeviceTypeID', 50)->nullable();
            $table->string('IpAddress', 50)->nullable();
            $table->boolean('Isdeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 250)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 250)->nullable();
            $table->unsignedInteger('EventRelatedFileId')->nullable();

            $table->primary(['EventActivityID'], 'pk_ecg_activity_events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ecg_Activity_Events');
    }
};
