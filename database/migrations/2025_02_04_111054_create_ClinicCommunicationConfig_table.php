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
        Schema::create('ClinicCommunicationConfig', function (Blueprint $table) {
            $table->uuid('ClinicCommunicationConfigID');
            $table->uuid('ClinicID');
            $table->uuid('ClinicCommunicationMasterID')->comment('1:> SMS.
2:> Email.');
            $table->text('AttributeValue1')->nullable();
            $table->text('AttributeValue2')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['ClinicCommunicationConfigID'], 'pk_table_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicCommunicationConfig');
    }
};
