<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Clinic', function (Blueprint $table) {
            $table->uuid('ClinicID')->default('newid()');
            $table->text('Name');
            $table->text('Address1')->nullable();
            $table->text('Address2');
            $table->string('City', 100)->nullable();
            $table->string('State', 50)->nullable();
            $table->unsignedInteger('CountryID');
            $table->string('Phone', 50)->nullable();
            $table->string('Fax', 50)->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Description')->nullable();
            $table->string('AuthenticationKey', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->text('FTPBackupServer')->nullable();
            $table->string('FTPPassword', 50)->nullable();
            $table->string('FTPUserID', 50)->nullable();
            $table->text('EmailHost')->nullable();
            $table->text('EmailPassword')->nullable();
            $table->string('EmailPort', 50)->nullable();
            $table->text('EmailUserid')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->uuid('AuthenticationKeyGuid')->nullable()->default('newid()');
            $table->unsignedInteger('LicenseTypeID')->nullable();
            $table->dateTime('LicenseValidTill')->nullable()->useCurrent();
            $table->string('ClinicCode', 50)->nullable();
            $table->binary('ClinicLetterHeadHeader')->nullable();
            $table->binary('ClinicLogo')->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->char('PatientKioskTabAccess', 50)->nullable();

            $table->primary(['ClinicID'], 'pk_clinic');

            DB::statement("ALTER TABLE `Clinic` MODIFY `ClinicLetterHeadHeader` LONGBLOB NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clinic');
    }
};
