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
        Schema::create('ECG_Clinic_SubscriptionModels', function (Blueprint $table) {
            $table->uuid('ClinicSubscriptionDetailID');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('SubscriptionPackageID')->nullable();
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('EndDate')->nullable();
            $table->boolean('IsCurrentSubscription')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicSubscriptionDetailID'], 'pk_ecg_clinic_subscriptionmodels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_Clinic_SubscriptionModels');
    }
};
