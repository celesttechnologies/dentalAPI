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
        Schema::create('PatientAllergyAttribute', function (Blueprint $table) {
            $table->uuid('PatientAllergyDetailID')->default('newid()');
            $table->uuid('PatientID');
            $table->string('AllergyAttributesCategory', 50);
            $table->unsignedInteger('AllergyAttributesID');
            $table->string('AllergyAttributeValue', 50)->nullable();
            $table->text('AllergyAttributeText')->nullable();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->useCurrent();

            $table->primary(['PatientAllergyDetailID'], 'pk_patientallergyattributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PatientAllergyAttribute');
    }
};
