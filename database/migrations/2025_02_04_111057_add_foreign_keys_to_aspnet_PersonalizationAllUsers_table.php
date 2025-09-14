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
        Schema::table('aspnet_PersonalizationAllUsers', function (Blueprint $table) {
            $table->foreign(['PathId'], 'FK__aspnet_Pe__PathI__162F4418')->references(['PathId'])->on('aspnet_Paths')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_PersonalizationAllUsers', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Pe__PathI__162F4418');
        });
    }
};
