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
        Schema::create('PatientDOC_Folders', function (Blueprint $table) {
            $table->increments('FolderId');
            $table->uuid('ClinicID')->nullable();
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->unsignedInteger('ParentFolderId')->nullable();
            $table->unsignedInteger('FolderTypeId')->nullable();
            $table->boolean('IsDeleted')->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->text('FolderPath')->nullable();
            $table->unsignedInteger('PartitionId')->nullable();
            $table->uuid('RowGuid')->nullable()->default('newid()');
            $table->string('FolderType', 50)->nullable();
            $table->string('Owner', 50);

            $table->primary(['FolderId'], 'pk_explosion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientDOC_Folders');
    }
};
