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
        Schema::create('aspnet_PersonalizationPerUser', function (Blueprint $table) {
            $table->uuid('Id')->default('newid()');
            $table->uuid('PathId')->nullable();
            $table->uuid('UserId')->nullable();
            $table->binary('PageSettings');
            $table->dateTime('LastUpdatedDate');

            $table->primary(['Id'], 'pk__aspnet_personali__18178c8a');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_PersonalizationPerUser');
    }
};
