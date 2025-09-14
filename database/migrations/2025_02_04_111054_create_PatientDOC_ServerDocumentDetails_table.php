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
        Schema::create('PatientDOC_ServerDocumentDetails', function (Blueprint $table) {
            $table->increments('Id');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('PartitionID')->nullable();
            $table->string('Title', 100)->nullable();
            $table->text('Description')->nullable();
            $table->text('FolderPath')->nullable();
            $table->text('AbsolutePath')->nullable();
            $table->unsignedInteger('IsDeleted')->nullable()->default(0);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->useCurrent();
            $table->string('Owner', 50)->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->uuid('RowGuid')->default('newid()');

            $table->primary(['Id'], 'pk_patientdoc_serverdocumentdetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDOC_ServerDocumentDetails');
    }
};
