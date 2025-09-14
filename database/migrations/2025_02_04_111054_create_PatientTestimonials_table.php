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
        Schema::create('PatientTestimonials', function (Blueprint $table) {
            $table->uuid('TestimonialID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->string('PatientName')->nullable();
            $table->string('Title')->nullable();
            $table->text('Description')->nullable();
            $table->dateTime('DateOfTestimonial')->nullable();
            $table->unsignedInteger('DocumentID')->nullable();
            $table->dateTime('PublishedFrom')->nullable();
            $table->dateTime('PublishedTill')->nullable();
            $table->boolean('ShowOnTV')->nullable()->default(false);
            $table->boolean('IsDelted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['TestimonialID'], 'pk_patienttestimonials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientTestimonials');
    }
};
