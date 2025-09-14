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
        Schema::create('ItemType1', function (Blueprint $table) {
            $table->increments('ItemTypeID');
            $table->string('Name', 200);
            $table->string('AddedBy', 50)->nullable();
            $table->dateTime('AddedOn')->useCurrent();
            $table->string('LastUpdatedBy', 50)->nullable();
            $table->dateTime('LastUpdatedOn')->nullable()->useCurrent();

            $table->primary(['ItemTypeID'], 'pk__itemtype__0ea330e9');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ItemType1');
    }
};
