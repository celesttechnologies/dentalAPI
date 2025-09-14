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
        Schema::create('PrescriptionTemplateMaster', function (Blueprint $table) {
            $table->uuid('PrescriptionTemplateMasterID');
            $table->text('PrescriptionTemplateName')->nullable();
            $table->text('PrescriptionTemplateDesc')->nullable();
            $table->text('PrescriptionNote')->nullable();
            $table->uuid('ClinicID')->nullable();
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
        Schema::dropIfExists('PrescriptionTemplateMaster');
    }
};
