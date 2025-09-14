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
        Schema::create('Ecg_ExternalRefferalMaster', function (Blueprint $table) {
            $table->uuid('ExternalRefferalMasterId');
            $table->uuid('ClinicId')->nullable();
            $table->string('RefferalName', 250)->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->string('CountryDialCode', 50)->nullable()->default('91');
            $table->text('Description')->nullable();
            $table->string('EmailId', 200)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ExternalRefferalMasterId'], 'pk_ecg_externalrefferalmaster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ecg_ExternalRefferalMaster');
    }
};
