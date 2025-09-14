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
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('CountryID');
            $table->string('CountryCode', 50)->nullable();
            $table->string('CountryName', 100)->nullable();
            $table->string('LastUpdatedBy', 100)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable();

            $table->primary(['CountryID'], 'pk_countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
