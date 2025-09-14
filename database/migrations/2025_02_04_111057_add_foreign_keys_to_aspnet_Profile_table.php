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
        Schema::table('aspnet_Profile', function (Blueprint $table) {
            $table->foreign(['UserId'], 'FK__aspnet_Pr__UserI__73DA2C14')->references(['UserId'])->on('aspnet_Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspnet_Profile', function (Blueprint $table) {
            $table->dropForeign('FK__aspnet_Pr__UserI__73DA2C14');
        });
    }
};
