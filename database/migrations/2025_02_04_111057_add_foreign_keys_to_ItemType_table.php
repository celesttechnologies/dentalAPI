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
        // Schema::table('ItemType', function (Blueprint $table) {
        //     $table->foreign(['ItemTypeID'], 'FK_ItemType_ItemType')->references(['ItemTypeID'])->on('ItemType')->onUpdate('no action')->onDelete('no action');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('ItemType', function (Blueprint $table) {
        //     $table->dropForeign('FK_ItemType_ItemType');
        // });
    }
};
