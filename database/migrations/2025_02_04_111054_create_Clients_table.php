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
        Schema::create('Clients', function (Blueprint $table) {
            $table->uuid('ClientID')->default('newid()');
            $table->text('ClientName')->nullable();
            $table->text('Address1')->nullable();
            $table->string('City', 100)->nullable();
            $table->string('State', 50)->nullable();
            $table->unsignedInteger('CountryID')->nullable();
            $table->dateTime('CreatedOn')->nullable();
            $table->string('CreatedBy', 50)->nullable();
            $table->text('Address2')->nullable();
            $table->text('Description')->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('Fax', 50)->nullable();
            $table->text('FinalDescription')->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->string('LastUpdatedOn', 50)->nullable();
            $table->unsignedInteger('NoOfClinics')->nullable();
            $table->string('Phone', 50)->nullable();
            $table->decimal('Revenue', 18, 0)->nullable();
            $table->uuid('rowguid')->nullable()->default('newid()');

            $table->primary(['ClientID'], 'pk_clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clients');
    }
};
