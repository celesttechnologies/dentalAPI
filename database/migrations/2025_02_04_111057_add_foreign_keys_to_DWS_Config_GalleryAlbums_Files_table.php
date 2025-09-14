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
        Schema::table('DWS_Config_GalleryAlbums_Files', function (Blueprint $table) {
            $table->foreign(['GalleryAlbumID'], 'FK_DWS_Config_GalleryAlbums_Files_DWS_Cofig_GalleryAlbums')->references(['GalleryAlbumID'])->on('DWS_Cofig_GalleryAlbums')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('DWS_Config_GalleryAlbums_Files', function (Blueprint $table) {
            $table->dropForeign('FK_DWS_Config_GalleryAlbums_Files_DWS_Cofig_GalleryAlbums');
        });
    }
};
