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
        Schema::create('ECG_PerpetualLicense_Master', function (Blueprint $table) {
            $table->increments('ECGLicenseID');
            $table->uuid('LicenseKey')->nullable()->default('newid()');
            $table->unsignedInteger('LicenseTypeID')->nullable()->comment('1:> Desktop Standard. 
2:> Desktop Pro. 
3:> Server Standard. 
4:> Server Pro. ');
            $table->dateTime('LicenseCreatedDate')->nullable()->useCurrent();
            $table->dateTime('LicenseActivatedOn')->nullable();
            $table->unsignedInteger('LicenseValidityTypeID')->nullable()->comment('1:> Valid till 30 days from Activation. 
2:> Valid till 90 days from Activation. 
3:> Valid till 356 days from Activation.
');
            $table->dateTime('LicenseDeactivatedOn')->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ECGLicenseID'], 'pk_ecg_perpetuallicense_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_PerpetualLicense_Master');
    }
};
