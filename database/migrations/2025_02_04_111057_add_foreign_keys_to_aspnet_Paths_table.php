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
        Schema::table('aspnet_Paths', function (Blueprint $table) {
            $table->foreign(['ApplicationId'], 'FK__aspnet_Pa__Appli__10766AC2')->references(['ApplicationId'])->on('aspnet_Applications')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_Paths', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Pa__Appli__10766AC2');
        });
    }
};
