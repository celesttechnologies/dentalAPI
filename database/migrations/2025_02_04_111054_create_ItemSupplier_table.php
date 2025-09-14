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
        Schema::create('ItemSupplier', function (Blueprint $table) {
            $table->uuid('ItemSupplierID')->default('newid()');
            $table->uuid('ClinicID');
            $table->string('SupplierName', 50)->nullable();
            $table->string('RegistrationNo', 50)->nullable();
            $table->string('ContactPerson', 50)->nullable();
            $table->string('Notes', 200)->nullable();
            $table->string('Street1', 200)->nullable();
            $table->string('Street2', 200)->nullable();
            $table->string('City', 100)->nullable();
            $table->string('State', 100)->nullable();
            $table->string('Country', 100)->nullable();
            $table->string('Postcode', 8)->nullable();
            $table->string('ISD', 6)->nullable();
            $table->string('STD', 6)->nullable();
            $table->string('Phone', 16)->nullable();
            $table->string('PermanentAddress', 200)->nullable();
            $table->dateTime('AddedOn')->nullable()->useCurrent();
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('DeletedOn')->nullable()->useCurrent();
            $table->string('DeletedBy', 50)->nullable();
            $table->boolean('IsActive')->nullable()->default(true);
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['ItemSupplierID'], 'pk_itemsupplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ItemSupplier');
    }
};
