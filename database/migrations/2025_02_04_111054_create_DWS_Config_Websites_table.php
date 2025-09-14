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
        Schema::create('DWS_Config_Websites', function (Blueprint $table) {
            $table->uuid('ClinicWebSiteID')->default('newid()');
            $table->uuid('ClinicID')->default('newid()');
            $table->text('ClinicURL')->nullable();
            $table->text('ClinicName')->nullable();
            $table->text('ClinicDescription')->nullable();
            $table->text('ClinicAddress')->nullable();
            $table->string('City', 50)->nullable();
            $table->string('State', 50)->nullable();
            $table->string('ZipCode', 50)->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->text('ClinicMapPath')->nullable();
            $table->text('AboutHeadDoctor')->nullable();
            $table->unsignedInteger('DefaultThemeID')->nullable();
            $table->unsignedInteger('DefaultLanguageID')->nullable();
            $table->text('FacebookURL')->nullable();
            $table->text('LinkedInURL')->nullable();
            $table->text('TwitterURL')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->text('ClinicLogo')->nullable();
            $table->text('ContactEmail')->nullable();
            $table->string('SubDomain', 100)->nullable();

            $table->primary(['ClinicWebSiteID'], 'pk_dws_config_websites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Config_Websites');
    }
};
