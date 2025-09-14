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
        Schema::create('DWS_Cofig_GalleryAlbums', function (Blueprint $table) {
            $table->uuid('GalleryAlbumID')->default('newid()');
            $table->uuid('ClinicWebSiteID')->nullable();
            $table->string('AlbumName', 50)->nullable();
            $table->text('AlbumDescription')->nullable();
            $table->string('AlbumTypeID', 50)->nullable();
            $table->boolean('IsDeleted')->nullable()->default(false);
            $table->dateTime('CreatedOn')->nullable()->useCurrent();
            $table->string('CreatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();

            $table->primary(['GalleryAlbumID'], 'pk_dws_cofig_galleryalbums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DWS_Cofig_GalleryAlbums');
    }
};
