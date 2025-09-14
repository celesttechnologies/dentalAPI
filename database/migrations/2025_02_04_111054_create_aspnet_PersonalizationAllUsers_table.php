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
        Schema::create('aspnet_PersonalizationAllUsers', function (Blueprint $table) {
            $table->uuid('PathId');
            $table->binary('PageSettings');
            $table->dateTime('LastUpdatedDate');

            $table->primary(['PathId'], 'pk__aspnet_personali__153b1fdf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_PersonalizationAllUsers');
    }
};
