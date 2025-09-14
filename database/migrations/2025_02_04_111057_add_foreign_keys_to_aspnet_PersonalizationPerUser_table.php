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
        Schema::table('aspnet_PersonalizationPerUser', function (Blueprint $table) {
            $table->foreign(['PathId'], 'FK__aspnet_Pe__PathI__19FFD4FC')->references(['PathId'])->on('aspnet_Paths')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['UserId'], 'FK__aspnet_Pe__UserI__1AF3F935')->references(['UserId'])->on('aspnet_Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_PersonalizationPerUser', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Pe__PathI__19FFD4FC');
            $table->dropForeign('FK__aspnet_Pe__UserI__1AF3F935');
        });
    }
};
