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
        Schema::create('DWS_Config_GalleryAlbums_Files', function (Blueprint $table) {
            $table->uuid('AlbumFileID')->default('newid()');
            $table->uuid('GalleryAlbumID')->nullable();
            $table->text('FileName')->nullable();
            $table->dateTime('UploadedOn')->nullable()->useCurrent();
            $table->text('FileUploadedNameAs')->nullable();

            $table->primary(['AlbumFileID'], 'pk_dws_config_galleryalbums_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Config_GalleryAlbums_Files');
    }
};
