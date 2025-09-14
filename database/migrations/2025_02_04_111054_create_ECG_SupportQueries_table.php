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
        Schema::create('ECG_SupportQueries', function (Blueprint $table) {
            $table->uuid('QueryID');
            $table->text('Name')->nullable();
            $table->text('EmailId')->nullable();
            $table->text('ContactNo')->nullable();
            $table->text('Query')->nullable();
            $table->uuid('ClinicID')->nullable();
            $table->dateTime('QueryDate')->nullable();
            $table->string('City', 50)->nullable();
            $table->text('IPAddress')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECG_SupportQueries');
    }
};
