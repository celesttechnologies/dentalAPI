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
        Schema::create('ECG_M_SubscriptionModels', function (Blueprint $table) {
            $table->uuid('SubscriptionModelID');
            $table->string('SubscriptionModelName', 50)->nullable();
            $table->unsignedInteger('SubscriptionPackageID')->nullable();
            $table->unsignedInteger('SubscriptionTypeID')->nullable()->default(1)->comment('1:> Online Model. 
2:> OffLine Model (Perpetual). ');
            $table->unsignedInteger('OrderNumber')->nullable();
            $table->unsignedInteger('UsersLimit')->nullable();
            $table->unsignedInteger('ProvidersLimit')->nullable();
            $table->unsignedInteger('PatientsLimit')->nullable();
            $table->unsignedInteger('AppointmentsLimit')->nullable();
            $table->unsignedInteger('WAVisitsLimit')->nullable();
            $table->unsignedInteger('DocumentSpaceLimit')->nullable();
            $table->text('LicenseModuleCodeCSV')->nullable();
            $table->boolean('IsActive')->nullable()->default(true);
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['SubscriptionModelID'], 'pk_ecg_m_subscriptionmodels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_M_SubscriptionModels');
    }
};
