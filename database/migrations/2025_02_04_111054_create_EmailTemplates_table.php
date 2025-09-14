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
        Schema::create('EmailTemplates', function (Blueprint $table) {
            $table->uuid('EmailTemplateID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('SituationID')->nullable();
            $table->unsignedInteger('EmailCategoryID')->nullable();
            $table->string('FromEmailID', 50)->nullable();
            $table->string('BCCEmailID', 50)->nullable();
            $table->text('SubjectEnglish')->nullable();
            $table->text('BodyEnglish')->nullable();
            $table->dateTime('EffectiveDate')->nullable()->useCurrent();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['EmailTemplateID'], 'pk_emailtemplates_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EmailTemplates');
    }
};
