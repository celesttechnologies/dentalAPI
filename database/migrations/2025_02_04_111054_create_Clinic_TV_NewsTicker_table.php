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
        Schema::create('Clinic_TV_NewsTicker', function (Blueprint $table) {
            $table->uuid('NewsTickerID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->text('Title')->nullable();
            $table->text('NewsTickerText')->nullable();
            $table->dateTime('PublishedFrom')->nullable();
            $table->dateTime('PublishedTo')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['NewsTickerID'], 'pk_clinic_tv_newsticker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clinic_TV_NewsTicker');
    }
};
