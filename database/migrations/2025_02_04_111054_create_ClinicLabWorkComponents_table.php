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
        Schema::create('ClinicLabWorkComponents', function (Blueprint $table) {
            $table->uuid('LabWorkComponentID');
            $table->uuid('ClinicID')->nullable();
            $table->text('ComponentName')->nullable();
            $table->text('ComponentDescription')->nullable();
            $table->decimal('LabWorkCost', 18)->nullable();
            $table->uuid('ComponentCategoryID')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['LabWorkComponentID'], 'pk_cliniclabworkcomponents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClinicLabWorkComponents');
    }
};
