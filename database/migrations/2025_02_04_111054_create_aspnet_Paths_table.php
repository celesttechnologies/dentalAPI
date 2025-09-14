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
        Schema::create('aspnet_Paths', function (Blueprint $table) {
            $table->uuid('ApplicationId');
            $table->uuid('PathId')->default('newid()');
            $table->string('Path', 256);
            $table->string('LoweredPath', 256);

            $table->primary(['PathId'], 'pk__aspnet_paths__0f824689');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Paths');
    }
};
