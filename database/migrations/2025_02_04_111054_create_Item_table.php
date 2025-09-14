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
        Schema::create('Item', function (Blueprint $table) {
            $table->uuid('ItemID')->default('newid()');
            $table->uuid('ClinicID')->nullable();
            $table->uuid('ItemTypeID');
            $table->string('ItemName', 200);
            $table->string('Manufacturer', 200)->nullable();
            $table->string('Description', 200)->nullable();
            $table->string('Measure', 50)->nullable();
            $table->string('UnitOfMeasure', 50)->nullable();
            $table->string('InternalPrescription', 50)->nullable();
            $table->unsignedInteger('MinimumQuantity')->nullable();
            $table->unsignedInteger('MaximumQuantity')->nullable();
            $table->unsignedInteger('ReorderQuantity')->nullable();
            $table->decimal('Rate', 19, 4)->nullable();
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn');
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->uuid('rowguid')->nullable()->default('newid()');
            $table->string('Location', 50)->nullable();
            $table->string('Shelflife', 50)->nullable();

            $table->primary(['ItemID'], 'pk_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Item');
    }
};
