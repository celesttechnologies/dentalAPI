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
        Schema::table('aspnet_Membership', function (Blueprint $table) {
            $table->foreign(['ApplicationId'], 'FK__aspnet_Me__Appli__5EDF0F2E')->references(['ApplicationId'])->on('aspnet_Applications')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['UserId'], 'FK__aspnet_Me__UserI__5FD33367')->references(['UserId'])->on('aspnet_Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_Membership', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Me__Appli__5EDF0F2E');
            $table->dropForeign('FK__aspnet_Me__UserI__5FD33367');
        });
    }
};
