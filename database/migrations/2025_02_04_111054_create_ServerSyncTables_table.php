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
        Schema::create('ServerSyncTables', function (Blueprint $table) {
            $table->uuid('ServerTableSyncID')->default('newid()');
            $table->string('TableName')->nullable();
            $table->string('PrimaryKey')->nullable();
            $table->boolean('IsTobeSync')->nullable()->default(false);
            $table->unsignedInteger('SyncOrder')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('LastSyncTime')->nullable();
            $table->text('LastStatusMessage')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('ClinicID')->nullable();

            $table->primary(['ServerTableSyncID'], 'pk_serversynctables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ServerSyncTables');
    }
};
