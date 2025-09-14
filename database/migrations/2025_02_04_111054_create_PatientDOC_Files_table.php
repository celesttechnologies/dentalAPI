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
        Schema::create('PatientDOC_Files', function (Blueprint $table) {
            $table->increments('ID');
            $table->uuid('PatientID');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('DocumentID')->nullable();
            $table->unsignedInteger('VersionNumber')->nullable();
            $table->unsignedInteger('RelatedVersionID')->nullable();
            $table->unsignedInteger('RelatedVersionNumber')->nullable();
            $table->unsignedInteger('FolderId')->nullable();
            $table->unsignedInteger('StatusID')->nullable();
            $table->string('Description', 200)->nullable();
            $table->text('FileName')->nullable();
            $table->text('VirtualFilePath')->nullable();
            $table->text('PhysicalFilePath')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('PublishOn')->nullable();
            $table->dateTime('ExpirationOn')->nullable();
            $table->string('RefId', 50)->nullable()->default('0');
            $table->unsignedInteger('RefId1')->nullable();
            $table->text('FileSize')->nullable();
            $table->string('FileType', 50)->nullable();
            $table->text('UploadedFileName')->nullable();
            $table->binary('FileThumbImage')->nullable();
            $table->string('ReferenceNo', 9);
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['ID'], 'pk_doc_');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDOC_Files');
    }
};
