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
        Schema::create('OtherCommunicationGroup', function (Blueprint $table) {
            $table->uuid('OtherCommunicationGroup');
            $table->uuid('CommunicationGroupMasterID')->nullable();
            $table->string('FirstName', 250)->nullable();
            $table->string('LastName', 250)->nullable();
            $table->string('MobileNumber', 50)->nullable();
            $table->string('EmailID', 50)->nullable();
            $table->string('GroupType', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('CreatedBy', 250)->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('LastUpdatedBy', 250)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->unsignedInteger('GroupSource')->nullable();
            $table->string('GroupSourceDesc', 100)->nullable();
            $table->string('CountryDialCode', 50)->nullable();

            $table->primary(['OtherCommunicationGroup'], 'pk_othercommunicationgroup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OtherCommunicationGroup');
    }
};
