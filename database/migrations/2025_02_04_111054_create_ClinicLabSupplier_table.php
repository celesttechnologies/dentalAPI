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
        Schema::create('ClinicLabSupplier', function (Blueprint $table) {
            $table->uuid('LabSupplierID');
            $table->uuid('ClinicID');
            $table->string('SupplierName', 256)->nullable();
            $table->string('RegistrationNo', 50)->nullable();
            $table->string('ContactPerson', 50)->nullable();
            $table->string('EmailAddress1', 50)->nullable();
            $table->string('EmailAddress2', 50)->nullable();
            $table->text('Notes')->nullable();
            $table->text('Address1')->nullable();
            $table->text('Address2')->nullable();
            $table->boolean('IsEmailLabOrderActive')->nullable();
            $table->boolean('IsActive')->nullable()->default(true);
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['LabSupplierID'], 'pk_cliniclabsupplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicLabSupplier');
    }
};
