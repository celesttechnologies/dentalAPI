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
        Schema::create('Patient', function (Blueprint $table) {
            $table->uuid('PatientID');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('ProviderID');
            $table->string('Title', 50);
            $table->string('FirstName', 50);
            $table->string('LastName', 50)->nullable();
            $table->char('Gender', 1)->nullable();
            $table->dateTime('DOB')->nullable();
            $table->string('AddressLine1');
            $table->string('AddressLine2')->nullable();
            $table->string('Street')->nullable();
            $table->string('Area')->nullable();
            $table->string('City', 50);
            $table->string('State', 50);
            $table->unsignedInteger('Country');
            $table->string('ZipCode', 50)->nullable();
            $table->string('PhoneNumber', 50)->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->string('EmailAddress1', 100)->nullable();
            $table->string('EmailAddress2', 100)->nullable();
            $table->string('Occupation', 100)->nullable();
            $table->string('ReferredBy', 100)->nullable();
            $table->uuid('ReferralPatientID')->nullable();
            $table->uuid('ReferralProviderID')->nullable();
            $table->text('ReferralDescription')->nullable();
            $table->binary('Imagethumbnail')->nullable();
            $table->string('ImagePath', 100)->nullable();
            $table->dateTime('RegistrationDate')->nullable();
            $table->unsignedInteger('Status')->nullable();
            $table->uuid('WorkFlowInstanceID')->nullable();
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('CaseID'); // Change from unsignedInteger to uuid

            $table->string('PatientCode', 50);
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->string('PatientRefNo', 50)->nullable();
            $table->text('PatientNotes')->nullable();
            $table->unsignedInteger('Age')->nullable();
            $table->uuid('FamilyID')->nullable();
            $table->boolean('IsCreatedExport')->nullable()->default(false);
            $table->dateTime('IsCreatedExportedOn')->nullable();
            $table->dateTime('IsLastUpdatedExportedOn')->nullable();
            $table->boolean('IsupdatedExport')->nullable()->default(false);
            $table->boolean('IsActiveSMSSubscriber')->nullable()->default(false);
            $table->boolean('IsActiveEmailSubscriber')->nullable()->default(false);
            $table->string('Nationality')->nullable();
            $table->string('PasswordHashSalt')->nullable()->default('123456');
            $table->string('MaritalStatus', 50)->nullable();
            $table->binary('Signatures')->nullable();
            $table->dateTime('SignatureDate')->nullable();
            $table->text('SignatureJson')->nullable();
            $table->unsignedInteger('ManualCaseId')->nullable();
            $table->string('CaseCodePrefix', 150)->nullable();
            $table->string('SecondaryMobile', 50)->nullable();
            $table->string('BloodGroup', 50)->nullable();
            $table->boolean('IsDead')->nullable()->default(false);

            $table->primary(['PatientID'], 'pk_patient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Patient');
    }
};
