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
        Schema::create('aspnet_SchemaVersions', function (Blueprint $table) {
            $table->string('Feature', 128);
            $table->string('CompatibleSchemaVersion', 128);
            $table->boolean('IsCurrentVersion');

            $table->primary(['Feature', 'CompatibleSchemaVersion'], 'pk__aspnet_schemaver__536d5c82');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_SchemaVersions');
    }
};
