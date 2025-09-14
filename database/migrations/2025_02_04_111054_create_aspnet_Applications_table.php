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
        Schema::create('aspnet_Applications', function (Blueprint $table) {
            $table->string('ApplicationName', 256)->unique('uq__aspnet_applicati__4ad81681');
            $table->string('LoweredApplicationName', 256)->unique('uq__aspnet_applicati__49e3f248');
            $table->uuid('ApplicationId')->default('newid()');
            $table->string('Description', 256)->nullable();

            $table->primary(['ApplicationId'], 'pk__aspnet_applicati__48efce0f');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Applications');
    }
};
