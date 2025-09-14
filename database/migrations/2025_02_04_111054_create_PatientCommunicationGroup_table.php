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
        Schema::create('PatientCommunicationGroup', function (Blueprint $table) {
            $table->uuid('CommunicationGroupID');
            $table->uuid('CommunicationGroupMasterGuid');
            $table->uuid('PatientID')->nullable();
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('GroupType')->nullable();
            $table->string('GroupName', 200)->nullable();
            $table->string('GroupDescription', 500)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();

            $table->primary(['CommunicationGroupID'], 'pk_communicationgroup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientCommunicationGroup');
    }
};
