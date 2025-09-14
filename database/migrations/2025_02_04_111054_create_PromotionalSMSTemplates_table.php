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
        Schema::create('PromotionalSMSTemplates', function (Blueprint $table) {
            $table->uuid('PromotionalSMSTemplateID');
            $table->uuid('ClinicID')->nullable();
            $table->text('Title')->nullable();
            $table->text('Message')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PromotionalSMSTemplates');
    }
};
