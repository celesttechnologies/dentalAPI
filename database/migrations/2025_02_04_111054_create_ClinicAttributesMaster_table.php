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
        Schema::create('ClinicAttributesMaster', function (Blueprint $table) {
            $table->uuid('ClinicAttributeMasterID')->default('newid()');
            $table->string('AttributeName', 50)->nullable();
            $table->text('AttributeDescription')->nullable();
            $table->unsignedInteger('Importance')->nullable()->default(0);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['ClinicAttributeMasterID'], 'pk_clinicattributesmaster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicAttributesMaster');
    }
};
