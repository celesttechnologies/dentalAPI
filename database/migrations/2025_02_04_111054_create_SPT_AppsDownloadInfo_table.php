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
        Schema::create('SPT_AppsDownloadInfo', function (Blueprint $table) {
            $table->uuid('DownloadID')->default('newid()');
            $table->string('username', 50)->nullable();
            $table->unsignedInteger('ApplicationTypeID')->nullable();
            $table->dateTime('DownloadedOn')->nullable();
            $table->string('IPAddress', 50)->nullable();
            $table->string('FingerPrint')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['DownloadID'], 'pk_spt_appsdownloadinfo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SPT_AppsDownloadInfo');
    }
};
