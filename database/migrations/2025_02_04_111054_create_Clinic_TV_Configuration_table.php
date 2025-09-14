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
        Schema::create('Clinic_TV_Configuration', function (Blueprint $table) {
            $table->uuid('ClinicTVConfigurationID')->default('newid()');
            $table->uuid('ClinicID');
            $table->text('ClinicName')->nullable();
            $table->text('Location')->nullable();
            $table->text('CustomText1')->nullable();
            $table->text('CustomText2')->nullable();
            $table->text('LogoPath')->nullable();
            $table->binary('ClinicLogo')->nullable();
            $table->text('MainScreenDisplayPath')->nullable();
            $table->text('SideScreenDisplayPath')->nullable();
            $table->text('VideoDisplayPath')->nullable();
            $table->boolean('AppointmentDisplayFlag')->nullable();
            $table->boolean('ScreenDisplayFlag')->nullable();
            $table->boolean('TestimonialDisplayFlag')->nullable();
            $table->boolean('SideScreenDisplayFlag')->nullable();
            $table->boolean('MediaScreenDisplayFlag')->nullable();
            $table->unsignedInteger('AppointmentDisplayTimePeriod')->nullable();
            $table->unsignedInteger('ScreenDisplayTimePeriod')->nullable();
            $table->unsignedInteger('TestimonialDisplayTimePeriod')->nullable();
            $table->unsignedInteger('SideScreenDisplayTimePeriod')->nullable();
            $table->unsignedInteger('NoOfScreensPerCycle')->nullable();
            $table->unsignedInteger('NoOfTestimonialPerCycle')->nullable();
            $table->unsignedInteger('NoOfMediaPerCycle')->nullable();
            $table->boolean('IsNewstickerDisplay')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicTVConfigurationID'], 'pk_clinictvconfiguration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clinic_TV_Configuration');
    }
};
