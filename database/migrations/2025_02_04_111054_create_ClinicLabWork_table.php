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
        Schema::create('ClinicLabWork', function (Blueprint $table) {
            $table->uuid('LabWorkID');
            $table->uuid('ClinicID')->nullable();
            $table->unsignedInteger('OrderNo')->nullable();
            $table->string('OrderNumber', 50)->nullable();
            $table->uuid('ProviderID')->nullable();
            $table->uuid('PatientID')->nullable();
            $table->dateTime('LabWorkDate')->nullable();
            $table->uuid('LabSupplierID')->nullable();
            $table->dateTime('DeliveryDate')->nullable();
            $table->unsignedInteger('OrderType')->nullable();
            $table->uuid('ParentLabWorkID')->nullable();
            $table->uuid('StageID')->nullable();
            $table->text('SentRecievedIDCSV')->nullable();
            $table->text('Shade')->nullable();
            $table->text('SelectedTeeth')->nullable();
            $table->string('PonticDesignsIDCSV', 50)->nullable();
            $table->string('CollarMetalDesignsIDCSV', 50)->nullable();
            $table->decimal('TotalCost', 18, 0)->nullable();
            $table->text('Instructions');
            $table->boolean('IsDeleted')->nullable();
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('lastUpdatedBy', 50)->nullable();
            $table->unsignedInteger('LabStatus')->nullable();
            $table->text('WarrantyDetails')->nullable();
            $table->dateTime('LabInvoiceDate')->nullable();
            $table->string('LabInvoiceNumber', 250)->nullable();

            $table->primary(['LabWorkID'], 'pk_cliniclabwork');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicLabWork');
    }
};
