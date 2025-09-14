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
        Schema::create('aspnet_Roles', function (Blueprint $table) {
            $table->uuid('ApplicationId');
            $table->uuid('RoleId')->default('newid()');
            $table->string('RoleName', 256);
            $table->string('LoweredRoleName', 256);
            $table->string('Description', 256)->nullable();

            $table->primary(['RoleId'], 'pk__aspnet_roles__7c6f7215');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_Roles');
    }
};
