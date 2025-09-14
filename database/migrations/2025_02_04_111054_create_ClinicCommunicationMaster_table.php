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
        Schema::create('ClinicCommunicationMaster', function (Blueprint $table) {
            $table->uuid('ClinicCommunicationMasterID');
            $table->unsignedInteger('CommunicationMasterTypeID')->nullable()->comment('1:> SMS. 
2:> Email.');
            $table->unsignedInteger('CommunicationMasterSubTypeID')->nullable();
            $table->text('CommunicationMasterSubTypeCode')->nullable();
            $table->string('Category', 50)->nullable()->comment('1:> Routine Reminder.
2:> Appoinment. 
3:> Waiting Area. 
4:> Prescription. 
5:> Payments. 
6:> Scheduler. 
7:> EcgTRAI. 
8:> Custom.
9:> Auto_EMail. ');
            $table->text('Description')->nullable();
            $table->unsignedInteger('CommunicationExecutionType')->nullable()->comment('1:> Auto. 
2:> Manual. ');
            $table->string('Attribute1', 50)->nullable();
            $table->string('DefaultAttributeValue1', 50)->nullable();
            $table->string('Attribute2', 50)->nullable();
            $table->string('DefaultAttributeValue2', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicCommunicationMasterID'], 'pk_cliniccommunicationmaster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicCommunicationMaster');
    }
};
