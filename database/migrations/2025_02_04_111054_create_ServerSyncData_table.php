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
        Schema::create('ServerSyncData', function (Blueprint $table) {
            $table->uuid('ServerSyncPrimaryID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->string('TableName')->nullable();
            $table->text('PrimaryKeyColumnName')->nullable();
            $table->text('PrimaryKeyID')->nullable();
            $table->uuid('rowguid')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->boolean('IsCreatedExported')->nullable();
            $table->dateTime('IsCreatedExportedOn')->nullable();
            $table->boolean('IsLastUpdatedExported')->nullable();
            $table->dateTime('IsLastUpdatedExportedOn')->nullable();
            $table->text('RowData')->nullable();

            $table->primary(['ServerSyncPrimaryID'], 'pk_serversyncdata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ServerSyncData');
    }
};
