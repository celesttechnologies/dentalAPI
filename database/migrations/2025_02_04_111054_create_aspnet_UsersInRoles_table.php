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
        Schema::create('aspnet_UsersInRoles', function (Blueprint $table) {
            $table->uuid('UserId');
            $table->uuid('RoleId');

            $table->primary(['UserId', 'RoleId'], 'pk__aspnet_usersinro__004002f9');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspnet_UsersInRoles');
    }
};
