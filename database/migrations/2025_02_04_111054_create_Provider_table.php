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
        Schema::create('Provider', function (Blueprint $table) {
            $table->uuid('ProviderID');
            $table->uuid('ClinicID')->nullable();
            $table->string('ProviderName', 100)->nullable();
            $table->string('Location', 50)->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Experience', 1000)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->binary('ProviderImage')->nullable();
            $table->string('PhoneNumber', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->unsignedInteger('Sequence')->nullable();
            $table->text('Attribute1')->nullable();
            $table->text('Attribute2')->nullable();
            $table->text('Attribute3')->nullable();
            $table->string('Category', 50)->nullable();
            $table->string('RegistrationNumber', 1000)->nullable();
            $table->boolean('DisplayInAppointmentsView')->nullable()->default(true)->comment('Bit valued property to allow doctor to be displayed for Appointments grid by default.');
            $table->uuid('UserID')->nullable();
            $table->unsignedInteger('IncentiveType')->nullable()->default(1)->comment('1-Fixed,2-Percentage');
            $table->decimal('IncentiveValue', 18, 0)->nullable();
            $table->string('ColorCode', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Provider');
    }
};
