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
        Schema::create('ECG_PerpetualLicense_Mapping', function (Blueprint $table) {
            $table->uuid('ClinicLicenseID');
            $table->text('ClinicName')->nullable();
            $table->string('EmailAddress', 256)->nullable();
            $table->string('MobileNumber', 256)->nullable();
            $table->uuid('LicenseKey')->nullable();
            $table->text('FingerPrintCode')->nullable();
            $table->boolean('IsActive')->nullable()->default(true);
            $table->dateTime('LicenseValidTill')->nullable();
            $table->dateTime('LicenseLastSyncedOn')->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicLicenseID'], 'pk_ecg_perpetuallicense_mapping');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_PerpetualLicense_Mapping');
    }
};
