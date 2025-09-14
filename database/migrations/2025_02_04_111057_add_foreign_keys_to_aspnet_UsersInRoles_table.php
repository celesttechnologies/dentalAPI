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
        Schema::table('aspnet_UsersInRoles', function (Blueprint $table) {
            $table->foreign(['RoleId'], 'FK__aspnet_Us__RoleI__02284B6B')->references(['RoleId'])->on('aspnet_Roles')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['UserId'], 'FK__aspnet_Us__UserI__01342732')->references(['UserId'])->on('aspnet_Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_UsersInRoles', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Us__RoleI__02284B6B');
            $table->dropForeign('FK__aspnet_Us__UserI__01342732');
        });
    }
};
