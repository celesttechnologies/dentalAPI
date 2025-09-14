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
        Schema::create('DOC_Version', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('DocumentID')->nullable();
            $table->unsignedInteger('VersionNumber')->nullable();
            $table->unsignedInteger('CategoryID')->nullable();
            $table->unsignedInteger('SubCategoryID')->nullable();
            $table->unsignedInteger('StatusID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->string('DocumentType', 200)->nullable();
            $table->string('Description', 200)->nullable();
            $table->string('CreatedBy', 100)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->dateTime('PublishOn')->nullable();
            $table->dateTime('ExpirationOn')->nullable();
            $table->unsignedInteger('RelatedVersionID')->nullable();
            $table->unsignedInteger('RelatedVersionNumber')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->boolean('IsExpired')->nullable()->default(false);
            $table->text('FileName')->nullable();
            $table->text('UploadedFilePath')->nullable();
            $table->text('PhysicalFilePath')->nullable();
            $table->unsignedInteger('RefId1')->nullable()->default(0);

            $table->primary(['ID'], 'pk_doc_version_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DOC_Version');
    }
};
