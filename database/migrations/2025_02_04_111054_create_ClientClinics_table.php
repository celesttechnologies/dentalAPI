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
        Schema::create('ClientClinics', function (Blueprint $table) {
            $table->uuid('ClientClinicID')->default('newid()');
            $table->uuid('ClientID')->nullable();
            $table->uuid('ClinicID')->nullable();

            $table->primary(['ClientClinicID'], 'pk_clientclinics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ClientClinics');
    }
};
