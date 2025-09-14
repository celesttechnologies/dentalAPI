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
        Schema::create('PersonalReminder', function (Blueprint $table) {
            $table->uuid('ReminderId');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->uuid('UserID')->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->unsignedInteger('ReminderTypeID')->nullable();
            $table->dateTime('ReminderDate');
            $table->string('ReminderSubject', 250);
            $table->text('ReminderDescription');
            $table->boolean('IsDeleted');
            $table->string('CreatedBy', 200);
            $table->dateTime('CreatedOn');
            $table->string('LastUpdatedBy', 200);
            $table->dateTime('LastUpdatedOn');
            $table->uuid('rowguid')->default('newid()');
            $table->unsignedInteger('StatusId')->nullable();

            $table->primary(['ReminderId'], 'pk_personalreminder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalReminder');
    }
};
